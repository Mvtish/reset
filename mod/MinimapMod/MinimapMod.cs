using System;
using System.Collections.Generic;
using System.Linq;
using BepInEx;
using BepInEx.Configuration;
using BepInEx.Logging;
using UnityEngine;

namespace MinimapMod
{
    [BepInPlugin("com.matia.sunkenland.minimap", "Minimap", "1.0.0")]
    public class MinimapMod : BaseUnityPlugin
    {
        public static MinimapMod Instance { get; private set; }
        
        private ConfigEntry<KeyCode> _toggleKey;
        private ConfigEntry<float> _minimapSize;
        private ConfigEntry<float> _detectionRange;
        private ConfigEntry<int> _minimapX;
        private ConfigEntry<int> _minimapY;
        private ConfigEntry<bool> _showPlayers;
        private ConfigEntry<bool> _showEnemies;
        private ConfigEntry<bool> _showAnimals;
        private ConfigEntry<bool> _showVehicles;
        private ConfigEntry<bool> _showLoot;
        private ConfigEntry<float> _updateInterval;
        private ConfigEntry<float> _scanInterval;
        
        public ManualLogSource Log { get { return Logger; } }
        
        private bool _minimapEnabled = true;
        private GameObject _minimapCanvas;
        private GameObject _minimapPanel;
        private GameObject _playerIcon;
        private Dictionary<GameObject, MinimapMarker> _markers = new Dictionary<GameObject, MinimapMarker>();
        private float _lastUpdateTime = 0f;
        private float _lastScanTime = 0f;
        private float _lastCameraUpdateTime = 0f; // Nueva variable para cámara
        private List<GameObject> _cachedEntities = new List<GameObject>();
        
        // Sistema de mapa de terreno tipo Minecraft
        private GameObject _minimapCameraObject;
        private Camera _minimapCamera;
        private RenderTexture _minimapRenderTexture;
        private GameObject _terrainDisplay;
        
        private void Awake()
        {
            Instance = this;
            
            // Configuración
            _toggleKey = Config.Bind("General", "ToggleKey", KeyCode.M, 
                "Tecla para mostrar/ocultar minimapa");
            
            _minimapSize = Config.Bind("Display", "Size", 180f, 
                "Tamaño del minimapa en píxeles. Default: 180");
            
            _detectionRange = Config.Bind("Display", "DetectionRange", 100f, 
                "Rango de detección de entidades. Default: 100");
            
            _minimapX = Config.Bind("Display", "PositionX", 15, 
                "Posición X del minimapa desde la izquierda. Default: 15");
            
            _minimapY = Config.Bind("Display", "PositionY", 15, 
                "Posición Y del minimapa desde arriba. Default: 15");
            
            _updateInterval = Config.Bind("Performance", "UpdateInterval", 0.033f, 
                "Intervalo de actualización de posiciones en segundos. Default: 0.033 (~30fps)");
            
            _scanInterval = Config.Bind("Performance", "ScanInterval", 2.0f, 
                "Intervalo de escaneo de nuevas entidades en segundos. Default: 2.0");
            
            _showPlayers = Config.Bind("Icons", "ShowPlayers", true, 
                "Mostrar jugadores en el minimapa");
            
            _showEnemies = Config.Bind("Icons", "ShowEnemies", true, 
                "Mostrar enemigos en el minimapa");
            
            _showAnimals = Config.Bind("Icons", "ShowAnimals", true, 
                "Mostrar animales en el minimapa");
            
            _showVehicles = Config.Bind("Icons", "ShowVehicles", true, 
                "Mostrar vehículos en el minimapa");
            
            _showLoot = Config.Bind("Icons", "ShowLoot", false, 
                "Mostrar contenedores/loot en el minimapa");
            
            Log.LogInfo("Minimapa cargado! Usa '" + _toggleKey.Value + "' para mostrarlo/ocultarlo");
        }
        
        private void Start()
        {
            CreateMinimap();
            CreateMinimapCamera();
        }
        
        private void Update()
        {
            if (Input.GetKeyDown(_toggleKey.Value))
            {
                _minimapEnabled = !_minimapEnabled;
                if (_minimapPanel != null)
                {
                    _minimapPanel.SetActive(_minimapEnabled);
                }
                
                // Habilitar/deshabilitar cámara para ahorrar rendimiento
                if (_minimapCamera != null)
                {
                    _minimapCamera.enabled = _minimapEnabled;
                }
                
                Log.LogInfo("Minimapa: " + (_minimapEnabled ? "Activado" : "Desactivado"));
            }
            
            if (!_minimapEnabled) return;
            
            // Escanear nuevas entidades menos frecuentemente
            if (Time.time - _lastScanTime >= _scanInterval.Value)
            {
                _lastScanTime = Time.time;
                ScanForEntities();
            }
            
            // Actualizar rotación del jugador cada frame para suavidad
            UpdatePlayerRotation();
            
            // Actualizar posiciones cada frame para máxima fluidez
            UpdateMarkerPositions();
            
            // Actualizar rotación de la cámara del minimapa cada frame para fluidez
            UpdateMinimapCameraRotation();
            
            // Actualizar posición y color de la cámara del minimapa menos frecuentemente (cada 0.1s)
            if (Time.time - _lastCameraUpdateTime >= 0.1f)
            {
                _lastCameraUpdateTime = Time.time;
                UpdateMinimapCameraPosition();
            }
        }
        
        private void CreateMinimap()
        {
            try
            {
                // Crear Canvas UI
                _minimapCanvas = new GameObject("MinimapCanvas");
                Canvas canvas = _minimapCanvas.AddComponent<Canvas>();
                canvas.renderMode = RenderMode.ScreenSpaceOverlay;
                canvas.sortingOrder = 1000; // Asegurar que está encima de todo
                
                UnityEngine.UI.CanvasScaler scaler = _minimapCanvas.AddComponent<UnityEngine.UI.CanvasScaler>();
                scaler.uiScaleMode = UnityEngine.UI.CanvasScaler.ScaleMode.ScaleWithScreenSize;
                scaler.referenceResolution = new Vector2(1920, 1080);
                
                // Panel contenedor del minimapa
                _minimapPanel = new GameObject("MinimapPanel");
                _minimapPanel.transform.SetParent(_minimapCanvas.transform, false);
                
                RectTransform panelRect = _minimapPanel.AddComponent<RectTransform>();
                panelRect.anchorMin = new Vector2(0, 1); // Esquina superior izquierda
                panelRect.anchorMax = new Vector2(0, 1);
                panelRect.pivot = new Vector2(0, 1);
                panelRect.anchoredPosition = new Vector2(_minimapX.Value, -_minimapY.Value);
                panelRect.sizeDelta = new Vector2(_minimapSize.Value, _minimapSize.Value);
                
                // Fondo circular del minimapa
                GameObject background = new GameObject("Background");
                background.transform.SetParent(_minimapPanel.transform, false);
                
                RectTransform bgRect = background.AddComponent<RectTransform>();
                bgRect.anchorMin = Vector2.zero;
                bgRect.anchorMax = Vector2.one;
                bgRect.sizeDelta = Vector2.zero;
                bgRect.anchoredPosition = Vector2.zero;
                
                UnityEngine.UI.Image bgImage = background.AddComponent<UnityEngine.UI.Image>();
                bgImage.color = new Color(0.1f, 0.1f, 0.1f, 0.85f); // Fondo oscuro
                
                // Display del terreno (debajo de todo)
                _terrainDisplay = new GameObject("TerrainDisplay");
                _terrainDisplay.transform.SetParent(_minimapPanel.transform, false);
                _terrainDisplay.transform.SetAsFirstSibling(); // Poner detrás de todo
                
                RectTransform terrainRect = _terrainDisplay.AddComponent<RectTransform>();
                terrainRect.anchorMin = Vector2.zero;
                terrainRect.anchorMax = Vector2.one;
                terrainRect.sizeDelta = Vector2.zero;
                terrainRect.anchoredPosition = Vector2.zero;
                
                UnityEngine.UI.RawImage terrainImage = _terrainDisplay.AddComponent<UnityEngine.UI.RawImage>();
                terrainImage.color = Color.white;
                
                // Borde
                GameObject border = new GameObject("Border");
                border.transform.SetParent(_minimapPanel.transform, false);
                
                RectTransform borderRect = border.AddComponent<RectTransform>();
                borderRect.anchorMin = Vector2.zero;
                borderRect.anchorMax = Vector2.one;
                borderRect.sizeDelta = new Vector2(4, 4);
                borderRect.anchoredPosition = Vector2.zero;
                
                UnityEngine.UI.Outline outline = border.AddComponent<UnityEngine.UI.Outline>();
                outline.effectColor = new Color(0.3f, 0.3f, 0.3f, 1f);
                outline.effectDistance = new Vector2(2, 2);
                
                UnityEngine.UI.Image borderImage = border.AddComponent<UnityEngine.UI.Image>();
                borderImage.color = new Color(0, 0, 0, 0);
                
                // Icono del jugador (flecha)
                _playerIcon = new GameObject("PlayerIcon");
                _playerIcon.transform.SetParent(_minimapPanel.transform, false);
                
                RectTransform playerRect = _playerIcon.AddComponent<RectTransform>();
                playerRect.anchorMin = new Vector2(0.5f, 0.5f);
                playerRect.anchorMax = new Vector2(0.5f, 0.5f);
                playerRect.pivot = new Vector2(0.5f, 0.5f);
                playerRect.anchoredPosition = Vector2.zero;
                playerRect.sizeDelta = new Vector2(20, 20); // Ajustado al nuevo tamaño
                
                UnityEngine.UI.Image playerImage = _playerIcon.AddComponent<UnityEngine.UI.Image>();
                playerImage.color = Color.white; // Blanco para que se vea el color de la textura
                
                // Crear sprite de flecha
                Texture2D arrowTex = CreateArrowTexture();
                Sprite arrowSprite = Sprite.Create(arrowTex, new Rect(0, 0, 20, 20), new Vector2(0.5f, 0.5f));
                playerImage.sprite = arrowSprite;
                
                DontDestroyOnLoad(_minimapCanvas);
                
                Log.LogInfo("Minimapa creado exitosamente!");
            }
            catch (Exception ex)
            {
                Log.LogError("Error creando minimapa: " + ex.ToString());
            }
        }
        
        private void ScanForEntities()
        {
            // Limpiar entidades destruidas de la caché
            _cachedEntities.RemoveAll(obj => obj == null || !obj.activeInHierarchy);
            
            // Solo buscar si necesitamos más entidades
            if (_cachedEntities.Count < 20)
            {
                var player = GetLocalPlayer();
                if (player == null) return;
                
                Vector3 playerPos = player.transform.position;
                
                // Buscar solo colisionadores cercanos (mucho más eficiente que FindObjectsOfType)
                Collider[] nearbyColliders = Physics.OverlapSphere(playerPos, _detectionRange.Value);
                
                foreach (Collider col in nearbyColliders)
                {
                    if (col == null || col.gameObject == null) continue;
                    
                    GameObject obj = col.gameObject;
                    
                    // Verificar si ya está en caché
                    if (_cachedEntities.Contains(obj)) continue;
                    
                    // Verificar si es una entidad relevante
                    if (IsRelevantEntity(obj.name))
                    {
                        _cachedEntities.Add(obj);
                        
                        if (_cachedEntities.Count >= 30) break; // Límite reducido para mejor performance
                    }
                }
            }
        }
        
        private bool IsRelevantEntity(string name)
        {
            string lowerName = name.ToLower();
            
            // Enemigos - basado en clases encontradas: Army, EnemyBoat
            if (_showEnemies.Value && (name.Contains("Army") || name.Contains("Enemy") || 
                name.Contains("Slaver") || name.Contains("Settler") || name.Contains("Bandit") ||
                name.Contains("Pirate") || name.Contains("Raider") || lowerName.Contains("hostile")))
            {
                return true;
            }
            
            // Animales - basado en clases: Animal, Fish, Bird, Piranha
            // También incluir variantes como LocalAnimal
            if (_showAnimals.Value && (name == "Animal" || name == "LocalAnimal" ||
                name == "Fish" || name == "Bird" || name == "Piranha" ||
                name.Contains("Shark") || name.Contains("Crab") || name.Contains("Seagull") ||
                name.Contains("Eagle") || name.Contains("Marlin") || name.Contains("Turtle") ||
                name.Contains("Dolphin") || name.Contains("Whale") ||
                lowerName.Contains("fish") || lowerName.Contains("bird") || lowerName.Contains("animal")))
            {
                return true;
            }
            
            // Vehículos - basado en clases: Boat, EnemyBoat, HelicopterController
            if (_showVehicles.Value && (name == "Boat" || name == "EnemyBoat" ||
                name.Contains("Helicopter") || name.Contains("Vehicle") || name.Contains("Raft") ||
                name.Contains("Ship") || name.Contains("Jetski") ||
                lowerName.Contains("boat") || lowerName.Contains("vehicle")))
            {
                return true;
            }
            
            // Estructuras opcionales - Chest, Bed, Buoy
            if (_showLoot.Value && (name == "Chest" || name == "ChestStorage" || name == "Bed" ||
                name == "Buoy" || name.Contains("Storage") || name.Contains("Container") ||
                lowerName.Contains("chest") || lowerName.Contains("buoy")))
            {
                return true;
            }
            
            return false;
        }
        
        private void UpdateMarkerPositions()
        {
            if (_minimapPanel == null) return;
            
            var player = GetLocalPlayer();
            if (player == null) return;
            
            Vector3 playerPos = player.transform.position;
            float playerYaw = player.transform.eulerAngles.y;
            
            // Limpiar marcadores de objetos destruidos
            List<GameObject> toRemove = new List<GameObject>();
            foreach (var kvp in _markers)
            {
                if (kvp.Key == null || !kvp.Key.activeInHierarchy)
                {
                    toRemove.Add(kvp.Key);
                }
            }
            
            foreach (var obj in toRemove)
            {
                RemoveMarker(obj);
                _cachedEntities.Remove(obj);
            }
            
            // Limitar número de marcadores visibles para performance
            int visibleMarkers = 0;
            int maxVisibleMarkers = 25;
            
            // Actualizar o crear marcadores solo de entidades cacheadas
            foreach (GameObject obj in _cachedEntities)
            {
                if (obj == null) continue;
                
                // Límite de marcadores visibles alcanzado
                if (visibleMarkers >= maxVisibleMarkers)
                {
                    if (_markers.ContainsKey(obj))
                    {
                        RemoveMarker(obj);
                    }
                    continue;
                }
                
                float distance = Vector3.Distance(obj.transform.position, playerPos);
                
                if (distance <= _detectionRange.Value && distance > 1f)
                {
                    if (!_markers.ContainsKey(obj))
                    {
                        Color color = GetEntityColor(obj.name);
                        CreateMarker(obj, color);
                    }
                    else
                    {
                        UpdateMarkerPosition(obj, playerPos, playerYaw);
                    }
                    visibleMarkers++; // Incrementar contador
                }
                else if (_markers.ContainsKey(obj))
                {
                    RemoveMarker(obj);
                }
            }
        }
        
        private Color GetEntityColor(string name)
        {
            string lowerName = name.ToLower();
            
            // ENEMIGOS/AGRESIVOS - ROJO
            // Incluye: Army, EnemyBoat, Piranha (pez agresivo), Sharks
            if (name.Contains("Army") || name.Contains("Enemy") || name.Contains("Slaver") || 
                name.Contains("Settler") || name.Contains("Bandit") || name.Contains("Pirate") ||
                name.Contains("Raider") || lowerName.Contains("hostile") ||
                name == "Piranha" || name.Contains("Shark") || lowerName.Contains("shark"))
            {
                return new Color(1f, 0.2f, 0.2f); // Rojo brillante
            }
            
            // VEHÍCULOS - AZUL
            // Incluye: Boat, EnemyBoat (también es vehículo), HelicopterController
            if (name == "Boat" || name == "EnemyBoat" || name.Contains("Helicopter") ||
                name.Contains("Vehicle") || name.Contains("Raft") || name.Contains("Ship") ||
                name.Contains("Jetski") || lowerName.Contains("boat") || lowerName.Contains("vehicle"))
            {
                return new Color(0.3f, 0.7f, 1f); // Azul cielo
            }
            
            // ESTRUCTURAS - AMARILLO (si _showLoot está activado)
            if (name == "Chest" || name == "ChestStorage" || name == "Bed" || name == "Buoy" ||
                name.Contains("Storage") || name.Contains("Container") ||
                lowerName.Contains("chest") || lowerName.Contains("buoy"))
            {
                return new Color(1f, 0.9f, 0.2f); // Amarillo dorado
            }
            
            // ANIMALES PACÍFICOS/NEUTRALES - ROSA CLARO
            // Incluye: Animal, Fish, Bird, y todos los demás no agresivos
            return new Color(1f, 0.6f, 0.8f); // Rosa claro
        }
        
        private void CreateMarker(GameObject target, Color color)
        {
            try
            {
                if (_minimapPanel == null) return;
                
                GameObject markerObj = new GameObject("Marker_" + target.GetInstanceID());
                markerObj.transform.SetParent(_minimapPanel.transform, false);
                
                RectTransform rect = markerObj.AddComponent<RectTransform>();
                rect.anchorMin = new Vector2(0.5f, 0.5f);
                rect.anchorMax = new Vector2(0.5f, 0.5f);
                rect.pivot = new Vector2(0.5f, 0.5f);
                rect.sizeDelta = new Vector2(8, 8);
                
                UnityEngine.UI.Image image = markerObj.AddComponent<UnityEngine.UI.Image>();
                image.color = color;
                
                // Hacer circular
                Texture2D circleTex = CreateCircleTexture(8);
                Sprite circleSprite = Sprite.Create(circleTex, new Rect(0, 0, 8, 8), new Vector2(0.5f, 0.5f));
                image.sprite = circleSprite;
                
                MinimapMarker marker = new MinimapMarker();
                marker.markerObject = markerObj;
                marker.rectTransform = rect;
                marker.image = image;
                
                _markers[target] = marker;
                _markers[target] = marker;
            }
            catch (Exception ex)
            {
                Log.LogError("Error creando marcador: " + ex.ToString());
            }
        }
        
        private void UpdateMarkerPosition(GameObject target, Vector3 playerPos, float playerYaw)
        {
            if (!_markers.ContainsKey(target)) return;
            
            MinimapMarker marker = _markers[target];
            if (marker == null || marker.markerObject == null)
            {
                _markers.Remove(target);
                return;
            }
            
            // Calcular posición relativa
            Vector3 targetPos = target.transform.position;
            Vector3 relativePos = targetPos - playerPos;
            
            // Proyectar al plano horizontal (ignorar altura)
            float dx = relativePos.x;
            float dz = relativePos.z;
            
            // Rotar según orientación del jugador (invertir coordenadas para orientación correcta)
            float angleRad = playerYaw * Mathf.Deg2Rad;
            float rotatedX = dx * Mathf.Cos(angleRad) - dz * Mathf.Sin(angleRad);
            float rotatedZ = dx * Mathf.Sin(angleRad) + dz * Mathf.Cos(angleRad);
            
            // Escalar al tamaño del minimapa (invertir Z para corregir orientación)
            float scale = (_minimapSize.Value / 2f) / _detectionRange.Value;
            float screenX = -rotatedX * scale;  // Invertido
            float screenZ = -rotatedZ * scale;  // Invertido
            
            // Limitar al borde del minimapa
            float maxRadius = _minimapSize.Value / 2f - 5f;
            float distance = Mathf.Sqrt(screenX * screenX + screenZ * screenZ);
            if (distance > maxRadius)
            {
                float ratio = maxRadius / distance;
                screenX *= ratio;
                screenZ *= ratio;
            }
            
            marker.rectTransform.anchoredPosition = new Vector2(screenX, screenZ);
        }
        
        private void UpdatePlayerRotation()
        {
            if (_playerIcon == null) return;
            
            var player = GetLocalPlayer();
            if (player == null) return;
            
            // La flecha apunta hacia arriba (norte) y no rota
            // El minimapa rota los marcadores alrededor del jugador
            _playerIcon.transform.localRotation = Quaternion.identity;
        }
        
        private Texture2D CreateArrowTexture()
        {
            int size = 20; // Más compacto
            Texture2D tex = new Texture2D(size, size, TextureFormat.RGBA32, false);
            tex.filterMode = FilterMode.Point; // Pixeles nítidos
            
            Color transparent = new Color(0, 0, 0, 0);
            Color arrowColor = new Color(0f, 1f, 0.2f, 1f); // Verde brillante
            Color borderColor = new Color(0f, 0f, 0f, 1f); // Borde negro
            
            // Limpiar
            for (int y = 0; y < size; y++)
            {
                for (int x = 0; x < size; x++)
                {
                    tex.SetPixel(x, y, transparent);
                }
            }
            
            int centerX = size / 2;
            int centerY = size / 2;
            
            // Flecha apuntando HACIA ARRIBA (norte) - bien proporcionada
            int[] triangleX = new int[] { centerX, centerX - 5, centerX + 5 };  // Punta arriba, base ancha
            int[] triangleY = new int[] { 16, 4, 4 }; // Punta arriba, base abajo
            
            // Rellenar triángulo con borde
            for (int y = 0; y < size; y++)
            {
                for (int x = 0; x < size; x++)
                {
                    if (IsPointInTriangle(x, y, triangleX, triangleY))
                    {
                        // Verificar si está en el borde
                        bool isBorder = IsPointNearTriangleBorder(x, y, triangleX, triangleY, 1);
                        tex.SetPixel(x, y, isBorder ? borderColor : arrowColor);
                    }
                }
            }
            
            tex.Apply();
            return tex;
        }
        
        private bool IsPointInTriangle(int px, int py, int[] tx, int[] ty)
        {
            float d1 = Sign(px, py, tx[0], ty[0], tx[1], ty[1]);
            float d2 = Sign(px, py, tx[1], ty[1], tx[2], ty[2]);
            float d3 = Sign(px, py, tx[2], ty[2], tx[0], ty[0]);
            
            bool hasNeg = (d1 < 0) || (d2 < 0) || (d3 < 0);
            bool hasPos = (d1 > 0) || (d2 > 0) || (d3 > 0);
            
            return !(hasNeg && hasPos);
        }
        
        private float Sign(float p1x, float p1y, float p2x, float p2y, float p3x, float p3y)
        {
            return (p1x - p3x) * (p2y - p3y) - (p2x - p3x) * (p1y - p3y);
        }
        
        private bool IsPointNearTriangleBorder(int px, int py, int[] tx, int[] ty, int threshold)
        {
            for (int i = 0; i < 3; i++)
            {
                int x1 = tx[i];
                int y1 = ty[i];
                int x2 = tx[(i + 1) % 3];
                int y2 = ty[(i + 1) % 3];
                
                float dist = DistanceToLineSegment(px, py, x1, y1, x2, y2);
                if (dist <= threshold)
                    return true;
            }
            return false;
        }
        
        private float DistanceToLineSegment(float px, float py, float x1, float y1, float x2, float y2)
        {
            float A = px - x1;
            float B = py - y1;
            float C = x2 - x1;
            float D = y2 - y1;
            
            float dot = A * C + B * D;
            float lenSq = C * C + D * D;
            float param = -1f;
            
            if (lenSq != 0)
                param = dot / lenSq;
            
            float xx, yy;
            
            if (param < 0)
            {
                xx = x1;
                yy = y1;
            }
            else if (param > 1)
            {
                xx = x2;
                yy = y2;
            }
            else
            {
                xx = x1 + param * C;
                yy = y1 + param * D;
            }
            
            float dx = px - xx;
            float dy = py - yy;
            return Mathf.Sqrt(dx * dx + dy * dy);
        }
        
        private Texture2D CreateCircleTexture(int size)
        {
            Texture2D tex = new Texture2D(size, size);
            Color transparent = new Color(0, 0, 0, 0);
            Color circleColor = Color.white;
            
            float radius = size / 2f;
            float center = size / 2f;
            
            for (int y = 0; y < size; y++)
            {
                for (int x = 0; x < size; x++)
                {
                    float dx = x - center + 0.5f;
                    float dy = y - center + 0.5f;
                    float distance = Mathf.Sqrt(dx * dx + dy * dy);
                    
                    if (distance <= radius - 0.5f)
                    {
                        tex.SetPixel(x, y, circleColor);
                    }
                    else
                    {
                        tex.SetPixel(x, y, transparent);
                    }
                }
            }
            
            tex.Apply();
            return tex;
        }
        
        private void RemoveMarker(GameObject target)
        {
            if (_markers.ContainsKey(target))
            {
                MinimapMarker marker = _markers[target];
                if (marker != null && marker.markerObject != null)
                {
                    Destroy(marker.markerObject);
                }
                _markers.Remove(target);
            }
        }
        
        private GameObject GetLocalPlayer()
        {
            try
            {
                // Buscar el jugador local por tag
                GameObject player = GameObject.FindGameObjectWithTag("Player");
                if (player != null) return player;
                
                // Alternativa: buscar por cámara principal
                Camera mainCam = Camera.main;
                if (mainCam != null)
                {
                    Transform parent = mainCam.transform.parent;
                    while (parent != null)
                    {
                        if (parent.name.Contains("Player") || parent.name.Contains("Character"))
                        {
                            return parent.gameObject;
                        }
                        parent = parent.parent;
                    }
                }
                
                return null;
            }
            catch
            {
                return null;
            }
        }
        
        private void CreateMinimapCamera()
        {
            try
            {
                // Crear RenderTexture para el minimapa (resolución optimizada para performance)
                _minimapRenderTexture = new RenderTexture(128, 128, 16);
                _minimapRenderTexture.filterMode = FilterMode.Bilinear;
                _minimapRenderTexture.antiAliasing = 1; // Sin antialiasing para mejor performance
                
                // Crear GameObject para la cámara
                _minimapCameraObject = new GameObject("MinimapCamera");
                _minimapCamera = _minimapCameraObject.AddComponent<Camera>();
                
                // Configurar cámara ortográfica cenital
                _minimapCamera.orthographic = true;
                _minimapCamera.orthographicSize = _detectionRange.Value / 2f;
                _minimapCamera.targetTexture = _minimapRenderTexture;
                _minimapCamera.clearFlags = CameraClearFlags.SolidColor;
                _minimapCamera.backgroundColor = new Color(0.1f, 0.5f, 1f, 1f); // Azul por defecto
                _minimapCamera.depth = -100;
                _minimapCamera.cullingMask = 0; // NO renderizar nada, solo color
                _minimapCamera.farClipPlane = 250f;
                _minimapCamera.allowHDR = false;
                _minimapCamera.allowMSAA = false;
                
                // Rotar para mirar hacia abajo
                _minimapCameraObject.transform.rotation = Quaternion.Euler(90f, 0f, 0f);
                
                // Asignar textura al display del terreno
                if (_terrainDisplay != null)
                {
                    UnityEngine.UI.RawImage terrainImage = _terrainDisplay.GetComponent<UnityEngine.UI.RawImage>();
                    if (terrainImage != null)
                    {
                        terrainImage.texture = _minimapRenderTexture;
                    }
                }
                
                DontDestroyOnLoad(_minimapCameraObject);
                
                Log.LogInfo("Cámara de minimapa creada exitosamente!");
            }
            catch (Exception ex)
            {
                Log.LogError("Error creando cámara de minimapa: " + ex.ToString());
            }
        }
        
        private void UpdateMinimapCameraRotation()
        {
            if (_minimapCamera == null || _minimapCameraObject == null) return;
            
            var player = GetLocalPlayer();
            if (player == null) return;
            
            // Rotar la cámara según la dirección del jugador (para que el norte siempre esté arriba)
            // Actualizado cada frame para fluidez total
            float playerYaw = player.transform.eulerAngles.y;
            _minimapCameraObject.transform.rotation = Quaternion.Euler(90f, playerYaw, 0f);
        }
        
        private void UpdateMinimapCameraPosition()
        {
            if (_minimapCamera == null || _minimapCameraObject == null) return;
            
            var player = GetLocalPlayer();
            if (player == null) return;
            
            // Posicionar la cámara sobre el jugador
            Vector3 playerPos = player.transform.position;
            _minimapCameraObject.transform.position = new Vector3(playerPos.x, playerPos.y + 200f, playerPos.z);
            
            // Ajustar el tamaño ortográfico según el rango de detección
            _minimapCamera.orthographicSize = _detectionRange.Value / 2f;
            
            // DETECCIÓN SIMPLE: Raycast hacia abajo, si hay terreno cerca = marrón, si no = azul
            RaycastHit hit;
            bool overLand = false;
            
            // Raycast 50m hacia abajo
            if (Physics.Raycast(playerPos, Vector3.down, out hit, 50f))
            {
                // Si hay algo a menos de 10 metros = tierra
                if (hit.distance < 10f)
                {
                    overLand = true;
                }
            }
            
            // Cambiar color: tierra = marrón, agua = azul
            if (overLand)
            {
                _minimapCamera.backgroundColor = new Color(0.55f, 0.45f, 0.3f, 1f); // Marrón/arena tierra
            }
            else
            {
                _minimapCamera.backgroundColor = new Color(0.1f, 0.5f, 1f, 1f); // Azul agua brillante
            }
        }
        
        private void OnDestroy()
        {
            if (_minimapCanvas != null)
            {
                Destroy(_minimapCanvas);
            }
            
            if (_minimapCameraObject != null)
            {
                Destroy(_minimapCameraObject);
            }
            
            if (_minimapRenderTexture != null)
            {
                _minimapRenderTexture.Release();
                Destroy(_minimapRenderTexture);
            }
            
            foreach (var marker in _markers.Values)
            {
                if (marker != null && marker.markerObject != null)
                {
                    Destroy(marker.markerObject);
                }
            }
            _markers.Clear();
        }
    }
    
    public class MinimapMarker
    {
        public GameObject markerObject;
        public RectTransform rectTransform;
        public UnityEngine.UI.Image image;
    }
}
