using System;
using System.Globalization;
using BepInEx;
using BepInEx.Configuration;
using HarmonyLib;
using UnityEngine;

[BepInPlugin("com.matia.sunkenland.ping", "Sunkenland Ping", "0.2.0")]
public sealed class PingMod : BaseUnityPlugin
{
    internal static PingMod Instance;
    private const string PingPrefix = "@@PING@@";
    
    private ConfigEntry<KeyCode> _pingKey;
    private ConfigEntry<float> _maxDistance;
    private ConfigEntry<float> _lifetime;
    private float _lastLocalPingAt;
    private Vector3 _lastLocalPingPoint;
    private System.Collections.Generic.Dictionary<string, GameObject> _playerPings = new System.Collections.Generic.Dictionary<string, GameObject>();
    private string _localPlayerName = "LocalPlayer";

    private void Awake()
    {
        Instance = this;
        _pingKey = Config.Bind("General", "PingKey", KeyCode.Mouse2, "Key to place ping");
        _maxDistance = Config.Bind("General", "MaxDistance", 150f, "Max ping distance");
        _lifetime = Config.Bind("General", "Lifetime", 8f, "Ping lifetime in seconds");
        
        var harmony = new Harmony("com.matia.sunkenland.ping");
        harmony.PatchAll();
        
        Logger.LogInfo("Sunkenland Ping loaded!");
    }

    private void Update()
    {
        if (Input.GetKeyDown(_pingKey.Value))
        {
            TrySendPing();
        }
        
        // F9 para listar todas las entidades detectables
        if (Input.GetKeyDown(KeyCode.F9))
        {
            ListAllEntities();
        }
    }

    private void TrySendPing()
    {
        var cam = Camera.main;
        if (cam == null) return;

        // Usar RaycastAll para obtener TODOS los hits (incluyendo triggers para cabeza/brazos Y layer Ignore Raycast para tiburones)
        RaycastHit[] allHits = Physics.RaycastAll(cam.transform.position, cam.transform.forward, _maxDistance.Value, ~0, QueryTriggerInteraction.Collide);
        
        if (allHits.Length == 0)
        {
            return;
        }
        
        // Ordenar por distancia (más cercano primero)
        System.Array.Sort(allHits, (a, b) => a.distance.CompareTo(b.distance));
        
        // Buscar el primer hit que NO sea parte del jugador local
        RaycastHit validHit = default(RaycastHit);
        bool foundValidHit = false;
        
        foreach (var hit in allHits)
        {
            if (hit.collider == null) continue;
            
            // Verificar si este objeto es parte del jugador local
            if (IsLocalPlayerObject(hit.collider.gameObject))
            {
                Logger.LogInfo(string.Format("Skipping local player object: {0} (layer: {1})", 
                    hit.collider.gameObject.name, 
                    LayerMask.LayerToName(hit.collider.gameObject.layer)));
                continue;
            }
            
            // Este es un hit válido (no es el jugador local)
            validHit = hit;
            foundValidHit = true;
            break;
        }
        
        if (!foundValidHit)
        {
            return;
        }

        // Detectar si es una entidad móvil
        Transform entityRoot = GetEntityRoot(validHit.collider.gameObject);
        
        Logger.LogInfo(string.Format("Trying to ping: {0}, EntityRoot: {1}", 
            validHit.collider.gameObject.name, 
            entityRoot != null ? entityRoot.name : "NULL"));
        
        // Si ya existe un ping del jugador local, verificar toggle
        if (_playerPings.ContainsKey(_localPlayerName))
        {
            var myPing = _playerPings[_localPlayerName];
            if (myPing != null)
            {
                SimplePingMarker marker = myPing.GetComponent<SimplePingMarker>();
                
                // Si el ping anterior está siguiendo una entidad y el nuevo también
                if (marker != null && marker.entityToTrack != null && entityRoot != null)
                {
                    // Verificar si es la MISMA entidad (comparar Transform)
                    if (marker.entityToTrack == entityRoot)
                    {
                        // Mismo mob/entidad = toggle, eliminar
                        Logger.LogInfo("Same entity clicked, removing ping");
                        Destroy(myPing);
                        _playerPings.Remove(_localPlayerName);
                        return;
                    }
                    else
                    {
                        // Diferente entidad, reemplazar
                        Logger.LogInfo("Different entity, replacing ping");
                        Destroy(myPing);
                        _playerPings.Remove(_localPlayerName);
                    }
                }
                // Si es ping estático y clickeamos cerca, eliminar
                else if (marker != null && marker.entityToTrack == null && entityRoot == null)
                {
                    float distance = Vector3.Distance(myPing.transform.position, validHit.point + Vector3.up * 0.3f);
                    if (distance < 3f)
                    {
                        Logger.LogInfo("Static ping near click, removing");
                        Destroy(myPing);
                        _playerPings.Remove(_localPlayerName);
                        return;
                    }
                    else
                    {
                        // Lejos, reemplazar
                        Logger.LogInfo("Static ping far, replacing");
                        Destroy(myPing);
                        _playerPings.Remove(_localPlayerName);
                    }
                }
                else
                {
                    // Cambio de tipo (estático <-> entidad), reemplazar
                    Logger.LogInfo("Changing ping type, replacing");
                    Destroy(myPing);
                    _playerPings.Remove(_localPlayerName);
                }
            }
        }
        
        // Obtener nombre si no se ha inicializado
        if (_localPlayerName == "LocalPlayer")
        {
            _localPlayerName = GetSteamPlayerName();
        }
        
        // Determinar color según categoría del objeto
        Color pingColor = GetPingColor(entityRoot, validHit.collider.gameObject.name);
        
        Logger.LogInfo(string.Format("Ping color: {0} for object: {1}", 
            pingColor, validHit.collider.gameObject.name));
        
        // Siempre usar el punto del raycast como posición inicial
        // Si es entidad, el componente SimplePingMarker se encargará de seguirla
        SpawnPing(validHit.point, _localPlayerName, entityRoot, pingColor);
        
        // Guardar para evitar duplicados al recibir nuestro propio ping
        _lastLocalPingAt = Time.time;
        _lastLocalPingPoint = validHit.point;
        
        // Enviar por chat para sincronización multiplayer
        SendPingToChat(validHit.point);
        
        Logger.LogInfo(string.Format("Ping at {0} on {1} (layer: {2})", validHit.point, validHit.collider.gameObject.name, LayerMask.LayerToName(validHit.collider.gameObject.layer)));
    }
    
    private Color GetPingColor(Transform entityRoot, string hitObjectName)
    {
        // Usar el nombre del entityRoot si existe, sino usar el nombre del objeto clickeado
        string name = entityRoot != null ? entityRoot.name : hitObjectName;
        
        // ROJO: Enemigos, animales y explosivos
        if (name.StartsWith("Army_") || name.StartsWith("Slaver") || 
            name.StartsWith("Settler") || name.StartsWith("Enemy") ||
            name.Contains("Seagull") || name.Contains("Fish") || 
            name.Contains("Sharks") || name.Contains("Crab") ||
            name.Contains("Mutant") || name.Contains("Marlin") ||
            name.Contains("Piranha") || name.Contains("Boar") ||
            name.Contains("ExplosiveBarrel"))
        {
            return Color.red; // Rojo
        }
        
        // CYAN: Armas y munición
        if (name.Contains("WeaponBox") || name.Contains("ToolBox") ||
            name.Contains("Ammo Box") || name.Contains("Ammo Chest"))
        {
            return new Color(0.6f, 0.87f, 0.87f); // Cyan
        }
        
        // AMARILLO: Recursos (combustible, químicos, naturales)
        if (name.Contains("Fuel Barrel") || name.Contains("Chemical Barrel") ||
            name.Contains("Mushrooms") || name.Contains("Branch") ||
            name.Contains("Scallop") || name.Contains("Algae"))
        {
            return Color.yellow; // Amarillo
        }
        
        // MAGENTA: Vehículos
        if (name.Contains("Helicopter") || name.Contains("Fast Boat") || 
            name.Contains("Bowrider"))
        {
            return Color.magenta; // Magenta
        }
        
        // AZUL: Containers especiales
        if (name.Contains("Military Container") || name.Contains("Reinforced Container") ||
            name.Contains("Wooden Chest") || name.Contains("Large Container"))
        {
            return Color.blue; // Azul
        }
        
        // Por defecto: Cyan (objetos con Clone u otros)
        return new Color(0.6f, 0.87f, 0.87f);
    }
    
    private bool IsLocalPlayerObject(GameObject obj)
    {
        if (obj == null) return false;
        
        // Método 1: Verificar si el objeto o sus padres contienen "Player" en capas específicas
        var layerName = LayerMask.LayerToName(obj.layer);
        if (layerName.Contains("Player") || layerName.Contains("Character"))
        {
            // Verificar si es parte del jugador local buscando componentes de cámara cercanos
            var cam = Camera.main;
            if (cam != null)
            {
                // Si el objeto está muy cerca de la cámara (menos de 3 metros), probablemente es el jugador local
                float distToCam = Vector3.Distance(obj.transform.position, cam.transform.position);
                if (distToCam < 3f)
                {
                    return true;
                }
            }
        }
        
        // Método 2: Verificar jerarquía de padres
        Transform current = obj.transform;
        for (int i = 0; i < 10; i++)
        {
            if (current == null) break;
            
            var parentLayerName = LayerMask.LayerToName(current.gameObject.layer);
            
            // Si encontramos capas típicas del jugador en la jerarquía
            if (parentLayerName == "Player" || 
                parentLayerName == "Player Bone" ||
                parentLayerName == "Character" ||
                parentLayerName == "LocalPlayer")
            {
                // Verificar distancia a la cámara
                var cam = Camera.main;
                if (cam != null && Vector3.Distance(current.position, cam.transform.position) < 3f)
                {
                    return true;
                }
            }
            
            current = current.parent;
        }
        
        return false;
    }
    
    private void ListAllEntities()
    {
        Logger.LogInfo("=== LISTADO DE OBJETOS INTERESANTES (TODO EL MAPA - 10km radio) ===");
        
        var cam = Camera.main;
        if (cam == null)
        {
            Logger.LogWarning("No camera found");
            return;
        }
        
        // Buscar todos los GameObjects activos
        var allObjects = UnityEngine.Object.FindObjectsOfType<GameObject>();
        var foundObjects = new System.Collections.Generic.HashSet<string>();
        int count = 0;
        
        foreach (var obj in allObjects)
        {
            if (obj == null || !obj.activeInHierarchy) continue;
            
            // Distancia
            float dist = Vector3.Distance(cam.transform.position, obj.transform.position);
            if (dist > 10000f) continue; // 10km - todo el mapa
            
            // Ignorar jugador local
            if (IsLocalPlayerObject(obj)) continue;
            
            string name = obj.name;
            
            // FILTRO: Solo objetos interesantes
            if (name.Contains("(Clone)") ||
                name.Contains("Container") ||
                name.Contains("Storage") ||
                name.Contains("Chest") ||
                name.Contains("Crate") ||
                name.Contains("Loot") ||
                name.Contains("Box") ||
                name.Contains("Barrel") ||
                name.Contains("Supply") ||
                name.Contains("Army_") ||
                name.Contains("Slaver") ||
                name.Contains("Settler") ||
                name.Contains("Enemy") ||
                name.Contains("Seagull") ||
                name.Contains("Crab") ||
                name.Contains("Mutant") ||
                name.Contains("Fish") ||
                name.Contains("Boar") ||
                name.Contains("Shark"))
            {
                string key = name + "_" + LayerMask.LayerToName(obj.layer);
                
                if (!foundObjects.Contains(key))
                {
                    foundObjects.Add(key);
                    count++;
                    
                    Logger.LogInfo(string.Format("{0}. {1} ({2}m) [Layer: {3}]", 
                        count, 
                        name, 
                        Mathf.RoundToInt(dist),
                        LayerMask.LayerToName(obj.layer)));
                }
            }
        }
        
        Logger.LogInfo(string.Format("=== TOTAL: {0} objetos encontrados ===", count));
    }
    
    private Transform GetEntityRoot(GameObject hitObject)
    {
        if (hitObject == null) return null;
        
        // Recorrer TODA la jerarquía hacia arriba buscando el root de la entidad
        Transform current = hitObject.transform;
        Transform entityRoot = null;
        int maxIterations = 20;
        int iterations = 0;
        
        while (current != null && iterations < maxIterations)
        {
            string name = current.name;
            
            // Parar si llegamos a un contenedor de escena
            if (name == "Locations" || name == "World" || 
                name == "Environment" || name == "Entities" ||
                name.StartsWith("Level ") || name.Contains("Island") ||
                current.parent == null)
            {
                break;
            }
            
            // MÉTODO EXACTO que funciona para Level 4:
            // Si tiene (Clone), es una entidad spawneada - PARAR AQUÍ
            if (name.Contains("(Clone)"))
            {
                entityRoot = current;
                break;
            }
            
            // Si empieza con Army_ o nombres conocidos de mobs - PARAR AQUÍ
            if (name.StartsWith("Army_") || name.StartsWith("Slaver") || 
                name.StartsWith("Settler") || name.StartsWith("Enemy"))
            {
                entityRoot = current;
                break;  // MISMO MÉTODO: break inmediato
            }
            
            // Detectar animales y mutantes por nombre - PARAR AQUÍ
            if (name.Contains("Seagull") || name.Contains("Fish") || 
                name.Contains("Sharks") || name.Contains("Crab") ||
                name.Contains("Mutant") || name.Contains("Marlin") ||
                name.Contains("Piranha") || name.Contains("Boar"))
            {
                entityRoot = current;
                break;  // MISMO MÉTODO: break inmediato, igual que Level 4
            }
            
            // OBJETOS DE ALTO VALOR: Armas, munición, explosivos
            if (name.Contains("WeaponBox") || name.Contains("ToolBox") ||
                name.Contains("Ammo Box") || name.Contains("Ammo Chest") ||
                name.Contains("ExplosiveBarrel"))
            {
                entityRoot = current;
                break;
            }
            
            // RECURSOS: Combustible y químicos
            if (name.Contains("Fuel Barrel") || name.Contains("Chemical Barrel"))
            {
                entityRoot = current;
                break;
            }
            
            // VEHÍCULOS
            if (name.Contains("Helicopter") || name.Contains("Fast Boat") || 
                name.Contains("Bowrider"))
            {
                entityRoot = current;
                break;
            }
            
            // LOOT CONTAINERS ESPECIALES
            if (name.Contains("Military Container") || name.Contains("Reinforced Container") ||
                name.Contains("Wooden Chest") || name.Contains("Large Container"))
            {
                entityRoot = current;
                break;
            }
            
            // RECURSOS NATURALES
            if (name.Contains("Mushrooms") || name.Contains("Branch") ||
                name.Contains("Scallop") || name.Contains("Algae"))
            {
                entityRoot = current;
                break;
            }
            
            // Subir en la jerarquía
            current = current.parent;
            iterations++;
        }
        
        if (entityRoot != null)
        {
            Logger.LogInfo("Entity detected: " + hitObject.name + " -> Root: " + entityRoot.name);
        }
        
        return entityRoot;
    }

    internal void SpawnPing(Vector3 point, string playerName)
    {
        SpawnPing(point, playerName, null, new Color(0.6f, 0.87f, 0.87f));
    }

    internal void SpawnPing(Vector3 point, string playerName, Transform entityToTrack, Color pingColor)
    {
        // DESTRUIR PING ANTERIOR de este jugador si existe
        if (_playerPings.ContainsKey(playerName))
        {
            var oldPing = _playerPings[playerName];
            if (oldPing != null)
            {
                Destroy(oldPing);
            }
        }
        
        // Contenedor - ajustar altura según tipo
        var marker = new GameObject("PingMarker");
        
        // Si es entidad, poner el ping sobre la cabeza (no muy arriba)
        float heightOffset = entityToTrack != null ? 1.2f : 0.3f;
        marker.transform.position = point + Vector3.up * heightOffset;
        
        // ESFERA CENTRAL
        var sphere = GameObject.CreatePrimitive(PrimitiveType.Sphere);
        sphere.transform.SetParent(marker.transform);
        sphere.transform.localPosition = Vector3.zero;
        sphere.transform.localScale = Vector3.one * 0.35f;
        
        var sphereCollider = sphere.GetComponent<Collider>();
        if (sphereCollider != null) Destroy(sphereCollider);
        
        var sphereRenderer = sphere.GetComponent<Renderer>();
        if (sphereRenderer != null)
        {
            sphereRenderer.material.color = pingColor;
        }
        
        // ANILLO (rombo)
        var ring = GameObject.CreatePrimitive(PrimitiveType.Cube);
        ring.transform.SetParent(marker.transform);
        ring.transform.localPosition = Vector3.zero;
        ring.transform.localScale = new Vector3(0.6f, 0.05f, 0.6f);
        ring.transform.localRotation = Quaternion.Euler(0f, 45f, 0f);
        
        var ringCollider = ring.GetComponent<Collider>();
        if (ringCollider != null) Destroy(ringCollider);
        
        var ringRenderer = ring.GetComponent<Renderer>();
        if (ringRenderer != null)
        {
            ringRenderer.material.color = pingColor;
        }
        
        // ICONO ARRIBA - TEXTO UNICODE GRANDE
        var iconTextObj = new GameObject("PingIconText");
        iconTextObj.transform.SetParent(marker.transform);
        iconTextObj.transform.localPosition = new Vector3(0f, 0.8f, 0f);
        
        var iconTextMesh = iconTextObj.AddComponent<TextMesh>();
        iconTextMesh.text = "\u25CF"; // Círculo lleno
        iconTextMesh.fontSize = 200;
        iconTextMesh.characterSize = 0.08f;
        iconTextMesh.color = pingColor;
        iconTextMesh.anchor = TextAnchor.MiddleCenter;
        iconTextMesh.fontStyle = FontStyle.Bold;
        
        // TEXTO DEBAJO
        var textObj = new GameObject("PingText");
        textObj.transform.SetParent(marker.transform);
        textObj.transform.localPosition = new Vector3(0f, -0.5f, 0f);
        
        var textMesh = textObj.AddComponent<TextMesh>();
        textMesh.text = "";
        textMesh.fontSize = 100;
        textMesh.characterSize = 0.1f;
        textMesh.color = Color.white;
        textMesh.anchor = TextAnchor.MiddleCenter;
        textMesh.fontStyle = FontStyle.Bold;
        
        // Componente para actualizar
        var pingComp = marker.AddComponent<SimplePingMarker>();
        pingComp.textMesh = textMesh;
        pingComp.iconTextMesh = iconTextMesh;
        pingComp.lifetime = _lifetime.Value;
        pingComp.entityToTrack = entityToTrack;
        
        if (entityToTrack != null)
        {
            Logger.LogInfo("Ping will track entity: " + entityToTrack.name);
        }
        
        // CALCULAR ESCALA INICIAL CORRECTA para que aparezca instantáneamente del tamaño correcto
        var cam = Camera.main;
        if (cam != null)
        {
            float dist = Vector3.Distance(cam.transform.position, marker.transform.position);
            float scaleFactor = Mathf.Lerp(0.1f, 0.8f, Mathf.Clamp01(dist / 50f));
            marker.transform.localScale = Vector3.one * scaleFactor;
            
            // También inicializar el texto con la distancia correcta
            textMesh.text = Mathf.RoundToInt(dist) + "m";
            
            // Billboard inicial
            Vector3 dir = marker.transform.position - cam.transform.position;
            textMesh.transform.rotation = Quaternion.LookRotation(dir);
            if (iconTextMesh != null)
            {
                iconTextMesh.transform.rotation = Quaternion.LookRotation(dir);
            }
        }
        
        // Guardar referencia al ping de este jugador
        _playerPings[playerName] = marker;
        
        // SONIDO DE PING - Generar beep sintético
        var audioSource = marker.AddComponent<AudioSource>();
        audioSource.spatialBlend = 0f; // 2D
        audioSource.volume = 0.5f;
        
        // Crear un beep corto (440 Hz - nota A4)
        int sampleRate = 44100;
        float frequency = 800f; // Hz - tono agudo
        float duration = 0.1f; // 100ms - muy corto
        int samples = (int)(sampleRate * duration);
        
        AudioClip beep = AudioClip.Create("PingBeep", samples, 1, sampleRate, false);
        float[] data = new float[samples];
        
        for (int i = 0; i < samples; i++)
        {
            float t = (float)i / sampleRate;
            // Onda sinusoidal con fade out
            float fadeOut = 1f - (t / duration);
            data[i] = Mathf.Sin(2 * Mathf.PI * frequency * t) * fadeOut * 0.5f;
        }
        
        beep.SetData(data, 0);
        audioSource.clip = beep;
        audioSource.Play();
        
        // Solo destruir automáticamente si NO es una entidad
        // Las entidades se destruyen cuando mueren
        if (entityToTrack == null)
        {
            Destroy(marker, _lifetime.Value);
            Logger.LogInfo(string.Format("Static ping created, will destroy in {0}s", _lifetime.Value));
        }
        else
        {
            Logger.LogInfo(string.Format("Entity ping created, tracking {0}, NO auto-destroy", entityToTrack.name));
        }
        
        Logger.LogInfo(string.Format("Created ping at {0}, sphere scale: {1}", marker.transform.position, sphere.transform.localScale));
    }

    
    private void SendPingToChat(Vector3 point)
    {
        // Obtener nombre actualizado
        if (_localPlayerName == "LocalPlayer")
        {
            _localPlayerName = GetSteamPlayerName();
        }
        
        // Formatear mensaje: @@PING@@;playerName;x;y;z
        string message = string.Format(CultureInfo.InvariantCulture, 
            "{0};{1};{2:F2};{3:F2};{4:F2}", 
            PingPrefix, _localPlayerName, point.x, point.y, point.z);
        
        // Buscar el chat y enviar mensaje
        var chat = UnityEngine.Object.FindObjectOfType<UIInGameTextChat>();
        if (chat == null)
        {
            Logger.LogWarning("Chat not found, ping will not sync to other players");
            return;
        }
        
        // Usar reflexión para llamar SendChatMessage
        var method = chat.GetType().GetMethod(
            "SendChatMessage",
            System.Reflection.BindingFlags.Instance | System.Reflection.BindingFlags.Public | System.Reflection.BindingFlags.NonPublic,
            null,
            new Type[] { typeof(string) },
            null);
        
        if (method != null)
        {
            method.Invoke(chat, new object[] { message });
            Logger.LogInfo("Ping sent to chat for multiplayer sync");
        }
        else
        {
            Logger.LogWarning("SendChatMessage method not found");
        }
    }
    
    internal bool IsDuplicateLocalPing(Vector3 point)
    {
        // Evitar crear ping duplicado si recibimos nuestro propio ping del chat
        if (Time.time - _lastLocalPingAt > 0.5f)
        {
            return false;
        }
        
        return Vector3.Distance(_lastLocalPingPoint, point) < 0.1f;
    }
    
    private string GetSteamPlayerName()
    {
        // Intentar obtener el nombre de Steam
        try
        {
            var steamworksType = Type.GetType("Steamworks.SteamFriends, Assembly-CSharp");
            if (steamworksType != null)
            {
                var method = steamworksType.GetMethod("GetPersonaName", 
                    System.Reflection.BindingFlags.Static | System.Reflection.BindingFlags.Public);
                if (method != null)
                {
                    var name = method.Invoke(null, null) as string;
                    if (!string.IsNullOrEmpty(name))
                    {
                        Logger.LogInfo("Steam name: " + name);
                        return name;
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Logger.LogWarning("Failed to get Steam name: " + ex.Message);
        }
        
        // Fallback: usar un ID único pero más corto
        var uniqueId = "Player" + UnityEngine.Random.Range(1000, 9999).ToString();
        Logger.LogInfo("Using fallback name: " + uniqueId);
        return uniqueId;
    }
}

public class SimplePingMarker : MonoBehaviour
{
    public TextMesh textMesh;
    public TextMesh iconTextMesh;
    public float lifetime;
    public Transform entityToTrack;
    private float startTime;
    private Vector3 lastKnownPosition;

    private void Start()
    {
        startTime = Time.time;
        lastKnownPosition = transform.position;
        
        if (entityToTrack != null)
        {
            Debug.Log(string.Format("[PingMod] SimplePingMarker Start - tracking entity: {0}", entityToTrack.name));
        }
        else
        {
            Debug.Log("[PingMod] SimplePingMarker Start - static ping");
        }
    }

    private void Update()
    {
        // Si la entidad que estamos siguiendo murió o desapareció, destruir ping
        if (entityToTrack != null)
        {
            // Verificar si la entidad sigue existiendo (Unity null check)
            try
            {
                // Acceder a una propiedad para forzar el null check de Unity
                var pos = entityToTrack.position;
                
                // Actualizar posición para seguir a la entidad
                // Offset para mantener en la cabeza
                Vector3 targetPos = pos + Vector3.up * 1.2f;
                transform.position = Vector3.Lerp(transform.position, targetPos, Time.deltaTime * 10f);
                lastKnownPosition = transform.position;
            }
            catch
            {
                // Entidad fue destruida (Unity lanza excepción al acceder)
                Debug.Log("[PingMod] Entity destroyed (exception), removing ping");
                Destroy(gameObject);
                return;
            }
        }
        else
        {
            // entityToTrack es null desde el inicio = ping estático
            // No hacer nada, mantener posición
        }
        
        if (textMesh == null) return;
        
        var cam = Camera.main;
        if (cam == null) return;
        
        float dist = Vector3.Distance(cam.transform.position, transform.position);
        textMesh.text = Mathf.RoundToInt(dist) + "m";
        
        // ESCALADO DINAMICO: pequeño cerca, grande lejos
        // Cerca (0m) = 0.1x, Media (25m) = 0.5x, Lejos (50m+) = 0.8x
        float scaleFactor = Mathf.Lerp(0.1f, 0.8f, Mathf.Clamp01(dist / 50f));
        transform.localScale = Vector3.one * scaleFactor;
        
        // Billboard para ambos textos
        Vector3 dir = transform.position - cam.transform.position;
        textMesh.transform.rotation = Quaternion.LookRotation(dir);
        if (iconTextMesh != null)
        {
            iconTextMesh.transform.rotation = Quaternion.LookRotation(dir);
        }
    }
}

[HarmonyPatch(typeof(UIInGameTextChat), "AddChatMessageAndShow")]
internal static class PingChatPatch
{
    private static bool Prefix(ref ValueTuple<string, string> chatMessage)
    {
        if (PingMod.Instance == null) return true;
        
        var msg = chatMessage.Item2;
        if (msg != null && msg.StartsWith("@@PING@@"))
        {
            // Parse: @@PING@@;playerName;x;y;z
            var parts = msg.Split(';');
            if (parts.Length == 5)
            {
                string playerName = parts[1];
                float x, y, z;
                if (float.TryParse(parts[2], NumberStyles.Float, CultureInfo.InvariantCulture, out x) &&
                    float.TryParse(parts[3], NumberStyles.Float, CultureInfo.InvariantCulture, out y) &&
                    float.TryParse(parts[4], NumberStyles.Float, CultureInfo.InvariantCulture, out z))
                {
                    Vector3 point = new Vector3(x, y, z);
                    
                    // Evitar duplicar nuestro propio ping local
                    if (!PingMod.Instance.IsDuplicateLocalPing(point))
                    {
                        PingMod.Instance.SpawnPing(point, playerName);
                    }
                    
                    // Ocultar mensaje de chat
                    return false;
                }
            }
        }
        
        return true;
    }
}
