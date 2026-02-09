# 🗺️ PROYECTO: Mejorar MinimapMod para Sunkenland

## 📋 Contexto del Proyecto

Estoy desarrollando un **mod de minimapa mejorado** para Sunkenland (juego de supervivencia en Unity 2021.3.33) usando **BepInEx 5.4.21** y **HarmonyX 2.10.1**.

Ya tengo un mod básico funcionando en `MinimapMod.cs` pero quiero mejorarlo significativamente.

---

## 🛠️ Herramientas Disponibles

### ✅ Tengo instalado y dominado:
- **dnSpy v6.1.8** - Decompilador .NET para analizar el código del juego
- **BepInEx 5.4.21** - Framework de modding
- **HarmonyX 2.10.1** - Librería de patching en runtime
- **Visual Studio Code** - Editor
- **.NET SDK 8.0.416** - Para compilar herramientas de análisis
- **.NET Standard 2.1** - Target para compilar mods

### 📂 Ubicaciones importantes:
- **Juego**: `C:\Program Files (x86)\Steam\steamapps\common\Sunkenland\`
- **DLLs del juego**: `...\Sunkenland_Data\Managed\`
  - `Assembly-CSharp.dll` (código del juego)
  - `Fusion.Runtime.dll` (networking)
  - `UnityEngine.*.dll` (módulos de Unity)
- **Plugins BepInEx**: `...\BepInEx\plugins\`
- **Mi workspace**: `C:\Users\matia\OneDrive\Escritorio\mod\`

---

## 📝 Estado Actual del Mod

### MinimapMod.cs - Funcionalidad actual:
```
Ubicación: C:\Users\matia\OneDrive\Escritorio\mod\MinimapMod\MinimapMod.cs
Estado: BÁSICO - Funciona pero limitado
```

**Lo que hace actualmente:**
- Muestra un minimapa básico en pantalla
- [DESCRIBIR FUNCIONALIDAD ACTUAL DEL MOD]

**Limitaciones conocidas:**
- [LISTAR PROBLEMAS ACTUALES]

---

## 🎯 Objetivos de Mejora

### Características que quiero agregar:

#### 1. **Minimapa Dinámico Mejorado**
- [ ] Mostrar posición del jugador en tiempo real
- [ ] Rotación del mapa según dirección del jugador
- [ ] Zoom in/out con teclas (Page Up/Down o rueda del mouse)
- [ ] Toggle on/off con tecla (ej: M o Tab)

#### 2. **Iconos y Marcadores**
- [ ] Icono del jugador (triángulo/flecha apuntando dirección)
- [ ] Waypoints/marcadores personalizados (click derecho para marcar)
- [ ] Mostrar compañeros de equipo (en multiplayer)
- [ ] Mostrar estructuras importantes (camas, cofres, estaciones de trabajo)
- [ ] Mostrar enemigos cercanos (opcional, con límite de distancia)

#### 3. **Interfaz Personalizable**
- [ ] Cambiar tamaño del minimapa (pequeño/mediano/grande)
- [ ] Cambiar posición (esquinas de pantalla)
- [ ] Cambiar opacidad/transparencia
- [ ] Modo "pantalla completa" para mapa grande (tecla M)
- [ ] Mini-brújula con direcciones N/S/E/O

#### 4. **Sistema de Coordenadas**
- [ ] Mostrar coordenadas X/Y/Z del jugador
- [ ] Mostrar coordenadas al hacer hover sobre el mapa
- [ ] Copiar coordenadas al portapapeles (click)

#### 5. **Marcadores Persistentes**
- [ ] Guardar waypoints entre sesiones
- [ ] Categorías de marcadores (Base, Recurso, Peligro, etc.)
- [ ] Nombres personalizados para marcadores
- [ ] Colores diferentes por categoría

#### 6. **Integración con Objetos del Juego**
- [ ] Detectar camas cercanas (spawn points)
- [ ] Detectar cofres y contenedores
- [ ] Detectar boyas y marcadores del juego
- [ ] Mostrar vehículos (barcos, helicópteros)

---

## 🔍 Análisis Necesario con dnSpy

### Clases que debo investigar:

#### 🎮 Sistema de Jugador
```
Buscar en Assembly-CSharp.dll:
- FPSPlayer (posición, rotación del jugador)
- FPSRigidBodyWalker (movimiento)
- Player (datos del jugador)
- Character (base del personaje)
```

#### 🗺️ Sistema de Mapa/Mundo
```
Buscar:
- MapManager / MapSystem (si existe)
- WorldManager (gestión del mundo)
- Minimap / MinimapCamera (si hay sistema nativo)
- GlobalData (datos globales del juego)
```

#### 📍 Marcadores y Navegación
```
Buscar:
- Buoy (boyas del juego)
- Bed (camas/spawn points)
- MapMarker / Waypoint
- NavigationSystem
```

#### 📦 Almacenamiento y Persistencia
```
Buscar:
- SaveManager (sistema de guardado)
- ES3 (Easy Save 3 - si lo usan)
- PlayerPrefs (guardado de configuración)
```

#### 🏗️ Estructuras e Ítems
```
Buscar:
- Structure / Building
- ChestStorage (cofres)
- Workstation (estaciones de trabajo)
- ItemData (datos de ítems)
```

---

## 💻 Enfoque de Desarrollo

### 1️⃣ Fase de Investigación (dnSpy)
1. Abrir `Assembly-CSharp.dll` en dnSpy
2. Buscar las clases mencionadas arriba
3. Identificar:
   - Propiedades para obtener posición del jugador
   - Eventos de interacción (clicks, teclas)
   - Sistema de coordenadas del juego
   - Formato de guardado de datos

### 2️⃣ Fase de Prototipado
1. Crear versión básica con:
   - Detección de posición del jugador
   - Renderizado de minimapa simple en OnGUI
   - Toggle on/off con tecla

### 3️⃣ Fase de Expansión
1. Agregar features incrementalmente:
   - Rotación del mapa
   - Iconos y marcadores
   - Sistema de persistencia
   - UI mejorada

### 4️⃣ Fase de Pulido
1. Optimización de rendimiento
2. Configuración personalizable
3. Manejo de errores
4. Documentación

---

## 🔧 Stack Técnico

### Dependencias del Mod:
```xml
<ItemGroup>
  <PackageReference Include="BepInEx.Core" Version="5.4.21" />
  <PackageReference Include="HarmonyX" Version="2.10.1" />
  <PackageReference Include="UnityEngine.Modules" Version="2021.3.33" />
</ItemGroup>

<ItemGroup>
  <!-- Referencias del juego -->
  <Reference Include="Assembly-CSharp">
    <HintPath>...\Sunkenland_Data\Managed\Assembly-CSharp.dll</HintPath>
  </Reference>
  <Reference Include="Fusion.Runtime">
    <HintPath>...\Sunkenland_Data\Managed\Fusion.Runtime.dll</HintPath>
  </Reference>
</ItemGroup>
```

### APIs de Unity a usar:
- **UnityEngine.GUI** - Para renderizar UI
- **UnityEngine.GUILayout** - Layouts automáticos
- **UnityEngine.Texture2D** - Texturas del minimapa
- **UnityEngine.RenderTexture** - Cámara del minimapa
- **UnityEngine.Camera** - Cámara secundaria para el mapa
- **UnityEngine.Transform** - Posiciones y rotaciones
- **UnityEngine.Input** - Detección de teclas/mouse
- **UnityEngine.PlayerPrefs** - Guardado de configuración

---

## 📚 Conocimientos Previos

### ✅ Ya sé hacer:
- Usar dnSpy para decompilary analizar código del juego
- Encontrar clases y métodos relevantes con búsquedas
- Crear mods con BepInEx (plugins)
- Usar Harmony para patchear métodos en runtime
- Acceder a propiedades y campos con Reflection
- Crear herramientas de análisis con Mono.Cecil
- Compilar e instalar mods en BepInEx
- Leer logs de BepInEx para debugging

### 🎓 Experiencia reciente:
Acabo de terminar **SunkenlandFusionUnleashed** - un mod que:
- Patches múltiples métodos de Fusion Networking
- Modifica TickRate de 30/60Hz a 120Hz
- Parchea BallisticSettings.MaximumDeltaTime
- Forzar targetFrameRate y VSync
- Mostrar diagnóstico en OnGUI
- Resultado: 100-135 FPS (antes 60 FPS cap)

---

## 🚀 Cómo Ayudarme

### Lo que necesito:

1. **Análisis guiado con dnSpy**
   - Qué clases buscar exactamente
   - Qué propiedades/métodos son útiles
   - Cómo extraer la información necesaria

2. **Estructura del código**
   - Arquitectura del mod (clases, métodos)
   - Mejores prácticas para minimapa
   - Patrones de diseño recomendados

3. **Implementación paso a paso**
   - Empezar por lo básico y ir agregando features
   - Código comentado y explicado
   - Manejo de errores y edge cases

4. **Optimización**
   - Evitar lag en el juego
   - Renderizado eficiente del minimapa
   - Caching de datos cuando sea posible

---

## ⚠️ Consideraciones Importantes

### Restricciones:
- **Performance**: El mod NO debe afectar los FPS del juego
- **Compatibilidad**: Debe funcionar en singleplayer y multiplayer
- **Sin modificar DLLs**: Solo runtime patching con Harmony
- **Distributable**: Otros usuarios deben poder instalarlo fácilmente

### Posibles desafíos:
- Sistema de coordenadas del juego (puede ser diferente a Unity estándar)
- Detección de objetos en el mundo (puede requerir raycasts o búsquedas)
- Persistencia de datos entre sesiones
- Sincronización en multiplayer (si aplica)

---

## 📖 Preguntas Específicas para Empezar

1. **¿Qué clase debo buscar en dnSpy para obtener la posición del jugador en tiempo real?**
   - ¿Es `FPSPlayer`, `Player`, o `Character`?
   - ¿Qué propiedad tiene las coordenadas (Transform, Position, Location)?

2. **¿Cómo puedo renderizar un minimapa en Unity?**
   - ¿Usar OnGUI básico con texturas?
   - ¿Crear una cámara secundaria con RenderTexture?
   - ¿Usar el sistema de UI de Unity (Canvas)?

3. **¿Cómo detectar objetos cercanos (camas, cofres, enemigos)?**
   - ¿Hay algún manager que liste todos los objetos?
   - ¿Necesito hacer Physics.OverlapSphere?
   - ¿Hay eventos cuando se spawnea/destruye algo?

4. **¿Cómo guardar configuración del mod?**
   - ¿PlayerPrefs es suficiente?
   - ¿Debo usar el sistema de guardado del juego?
   - ¿Archivo JSON/XML en BepInEx/config/?

---

## 🎯 Entregables Esperados

Al finalizar este proyecto, quiero tener:

1. ✅ **MinimapMod mejorado** con todas las features listadas
2. ✅ **Documentación** de cómo usar el mod (README.md)
3. ✅ **Configuración** editable (archivo .cfg en BepInEx/config)
4. ✅ **Código limpio** y bien comentado
5. ✅ **Build script** para compilar e instalar automáticamente

---

## 💡 Ideas Adicionales (Opcional)

Si sobra tiempo o capacidad:
- Minimapa en 3D (con elevación del terreno)
- Líneas de ruta al waypoint activo
- Historial de posiciones (trail/rastro)
- Captura de screenshot del mapa completo
- Compartir waypoints con otros jugadores
- Integración con Discord (compartir coordenadas)

---

## 🔗 Referencias Útiles

- **BepInEx Docs**: https://docs.bepinex.dev/
- **Harmony Docs**: https://harmony.pardeike.net/
- **Unity Scripting API**: https://docs.unity3d.com/2021.3/Documentation/ScriptReference/

---

## ✨ Notas Finales

- Tengo experiencia reciente exitosa con modding complejo
- dnSpy es mi herramienta principal y la domino bien
- Prefiero código explicado paso a paso
- Puedo analizar y entender código del juego sin problemas
- Quiero aprender mejores prácticas mientras desarrollo

**Estoy listo para empezar. ¿Por dónde comenzamos?** 🚀
