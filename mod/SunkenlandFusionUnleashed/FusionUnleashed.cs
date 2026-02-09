using BepInEx;
using HarmonyLib;
using UnityEngine;
using Fusion;
using System;
using System.Reflection;

namespace SunkenlandFusionUnleashed
{
    [BepInPlugin(PluginInfo.PLUGIN_GUID, PluginInfo.PLUGIN_NAME, PluginInfo.PLUGIN_VERSION)]
    public class FusionUnleashed : BaseUnityPlugin
    {
        // CONFIGURACIÓN ÓPTIMA
        // TickRate: 60Hz es el mejor balance performance/networking
        // 30Hz = networking original (más FPS, menos preciso)
        // 60Hz = networking fluido (balance óptimo)
        // 120Hz = networking premium (alto CPU, máxima precisión)
        private static int TargetTickRate = 60;
        private static int TargetFPS = 300;
        
        // Profiling detallado
        private static float lastFPSCheck = 0f;
        private static int frameCount = 0;
        private static float avgFPS = 0f;
        private static float minFPS = 999f;
        private static float maxFPS = 0f;
        
        private void Awake()
        {
            Logger.LogInfo($"[FUSION UNLEASHED] Loading...");
            
            // FORZAR configuración agresiva de FPS
            Application.targetFrameRate = TargetFPS;
            QualitySettings.vSyncCount = 0;
            Time.maximumDeltaTime = 0.1f;
            
            // DESBLOQUEAR OnDemandRendering (Unity limita a 60 FPS por defecto)
            UnityEngine.Rendering.OnDemandRendering.renderFrameInterval = 1;
            
            // HDRP EXPERIMENTAL: Forzar unlimited FPS en QualitySettings
            try
            {
                // Desactivar todas las limitaciones de calidad
                QualitySettings.maxQueuedFrames = 0; // Sin buffer de frames
                QualitySettings.streamingMipmapsActive = false; // Sin streaming de texturas que cause lag
                
                Logger.LogInfo($"[FUSION UNLEASHED] QualitySettings.maxQueuedFrames: 0");
            }
            catch (Exception ex)
            {
                Logger.LogWarning($"[FUSION UNLEASHED] QualitySettings patch failed: {ex.Message}");
            }
            
            Logger.LogInfo($"[FUSION UNLEASHED] Forced targetFrameRate: {TargetFPS}");
            Logger.LogInfo($"[FUSION UNLEASHED] Forced vSyncCount: 0");
            Logger.LogInfo($"[FUSION UNLEASHED] Forced maximumDeltaTime: {Time.maximumDeltaTime}");
            Logger.LogInfo($"[FUSION UNLEASHED] OnDemandRendering.renderFrameInterval: 1");
            
            // Aplicar patches de Harmony
            var harmony = new Harmony(PluginInfo.PLUGIN_GUID);
            harmony.PatchAll();
            
            Logger.LogInfo($"[FUSION UNLEASHED] Target TickRate: {TargetTickRate}Hz");
            Logger.LogInfo($"[FUSION UNLEASHED] Loaded successfully!");
        }

        private void Update()
        {
            // Forzar targetFrameRate continuamente
            if (Application.targetFrameRate != TargetFPS)
            {
                Application.targetFrameRate = TargetFPS;
            }
            if (QualitySettings.vSyncCount != 0)
            {
                QualitySettings.vSyncCount = 0;
            }
            
            // Forzar OnDemandRendering desbloqueado
            if (UnityEngine.Rendering.OnDemandRendering.renderFrameInterval != 1)
            {
                UnityEngine.Rendering.OnDemandRendering.renderFrameInterval = 1;
            }
            
            // FPS profiling cada 2 segundos
            frameCount++;
            float currentTime = Time.time;
            
            if (currentTime - lastFPSCheck >= 2.0f)
            {
                avgFPS = frameCount / (currentTime - lastFPSCheck);
                
                Logger.LogInfo($"[FPS ANALYSIS] 2s average:");
                Logger.LogInfo($"  Avg FPS: {avgFPS:F1}");
                Logger.LogInfo($"  Min FPS: {minFPS:F1}");
                Logger.LogInfo($"  Max FPS: {maxFPS:F1}");
                Logger.LogInfo($"  Frame Time: {1000f / avgFPS:F2}ms");
                Logger.LogInfo($"  Physics Rate: {1f / Time.fixedDeltaTime:F1}Hz ({Time.fixedDeltaTime * 1000f:F2}ms)");
                Logger.LogInfo($"  Target TickRate: {TargetTickRate}Hz");
                
                // Reset
                frameCount = 0;
                lastFPSCheck = currentTime;
                minFPS = 999f;
                maxFPS = 0f;
            }
            
            // Track min/max FPS
            float currentFPS = 1.0f / Time.deltaTime;
            if (currentFPS < minFPS) minFPS = currentFPS;
            if (currentFPS > maxFPS) maxFPS = currentFPS;
        }

        private void OnGUI()
        {
            // HUD de FPS en esquina superior derecha
            GUIStyle style = new GUIStyle();
            style.fontSize = 20;
            style.fontStyle = FontStyle.Bold;
            style.normal.textColor = Color.cyan;
            style.alignment = TextAnchor.UpperRight;
            
            GUIStyle shadow = new GUIStyle(style);
            shadow.normal.textColor = Color.black;
            
            float fps = 1.0f / Time.deltaTime;
            float deltaMs = Time.deltaTime * 1000f;
            
            // Color según FPS
            if (fps >= 100) style.normal.textColor = Color.green;
            else if (fps >= 60) style.normal.textColor = Color.cyan;
            else style.normal.textColor = Color.yellow;
            
            string text = $"FPS: {fps:F0} ({deltaMs:F1}ms)\n" +
                         $"TickRate: {TargetTickRate}Hz | Physics: {1f / Time.fixedDeltaTime:F0}Hz\n" +
                         $"VSync: {QualitySettings.vSyncCount} | Target: {Application.targetFrameRate}\n" +
                         $"v2.9 - FPS Unleashed";
            
            float width = 450;
            float x = Screen.width - width - 10;
            float y = 10;
            
            GUI.Label(new Rect(x + 2, y + 2, width, 90), text, shadow);
            GUI.Label(new Rect(x, y, width, 90), text, style);
        }

        // ========================
        // PATCHES DE HARMONY
        // ========================

        /// <summary>
        /// Intercepta el método Init() que inicializa SimulationConfig
        /// ESTE ES EL PATCH MÁS IMPORTANTE
        /// </summary>
        [HarmonyPatch(typeof(SimulationConfig), "Init")]
        public static class SimulationConfig_Init_Patch
        {
            static void Postfix(SimulationConfig __result)
            {
                if (__result != null && __result.TickRate < TargetTickRate)
                {
                    int original = __result.TickRate;
                    __result.TickRate = TargetTickRate;
                    Debug.Log($"[FUSION UNLEASHED] Init() - TickRate: {original} -> {__result.TickRate}");
                }
            }
        }

        /// <summary>
        /// Intercepta el método Copy() para mantener nuestro TickRate
        /// </summary>
        [HarmonyPatch(typeof(SimulationConfig), "Copy")]
        public static class SimulationConfig_Copy_Patch
        {
            static void Postfix(SimulationConfig __result)
            {
                if (__result != null && __result.TickRate < TargetTickRate)
                {
                    int original = __result.TickRate;
                    __result.TickRate = TargetTickRate;
                    Debug.Log($"[FUSION UNLEASHED] Copy() - TickRate: {original} -> {__result.TickRate}");
                }
            }
        }

        /// <summary>
        /// Intercepta StartGame para modificar el Config
        /// </summary>
        [HarmonyPatch(typeof(NetworkRunner), "StartGame")]
        public static class NetworkRunner_StartGame_Patch
        {
            static void Prefix(StartGameArgs args)
            {
                Debug.Log($"[FUSION UNLEASHED] StartGame intercepted - Mode: {args.GameMode}");
                
                // Intentar modificar la config si existe
                if (args.Config != null)
                {
                    var simConfig = args.Config.Simulation;
                    if (simConfig != null && simConfig.TickRate < TargetTickRate)
                    {
                        int original = simConfig.TickRate;
                        simConfig.TickRate = TargetTickRate;
                        Debug.Log($"[FUSION UNLEASHED] Config.Simulation.TickRate: {original} -> {TargetTickRate}");
                    }
                }
            }
        }

        /// <summary>
        /// Patch agresivo: Modifica CUALQUIER SimulationConfig que se cree
        /// </summary>
        [HarmonyPatch(typeof(SimulationConfig), MethodType.Constructor)]
        public static class SimulationConfig_Constructor_Patch
        {
            static void Postfix(SimulationConfig __instance)
            {
                // El constructor default pone TickRate = 60
                // Lo cambiamos inmediatamente
                if (__instance.TickRate == 60 || __instance.TickRate == 30)
                {
                    __instance.TickRate = TargetTickRate;
                    Debug.Log($"[FUSION UNLEASHED] Constructor - TickRate set to {TargetTickRate}");
                }
            }
        }

        // PATCHES ELIMINADOS: NetworkRunner.Update y InvokeUpdate
        // RAZÓN: Estos patches interfieren con la lógica interna de Fusion
        // Fusion NECESITA controlar su deltaTime para sincronización de red correcta
        // Al forzar Time.deltaTime, rompíamos el networking y CAUSÁBAMOS el limitador

        /// <summary>
        /// Patch para desbloquear limitación de Camera refresh rate
        /// </summary>
        [HarmonyPatch(typeof(Camera), "Render")]
        public static class Camera_Render_Patch
        {
            private static bool hasLoggedOnce = false;
            
            static void Prefix(Camera __instance)
            {
                // Forzar que las cámaras rendericen cada frame
                if (__instance.targetTexture != null)
                {
                    if (!hasLoggedOnce)
                    {
                        Debug.Log($"[FUSION UNLEASHED] Camera with targetTexture detected, forcing unlimited refresh");
                        hasLoggedOnce = true;
                    }
                }
            }
        }

        /// <summary>
        /// PATCH DEFINITIVO: Sobrescribe BallisticSettings.MaximumDeltaTime en runtime
        /// Ejecuta UNA VEZ cuando se detecta el primer FixedUpdate de BulletHandler
        /// </summary>
        [HarmonyPatch]
        public static class BulletHandler_FixedUpdate_Patch
        {
            private static bool ballisticsPatched = false;

            static MethodBase TargetMethod()
            {
                var assembly = Assembly.Load("Assembly-CSharp");
                var type = assembly.GetType("Ballistics.BulletHandler");
                return type?.GetMethod("FixedUpdate", BindingFlags.NonPublic | BindingFlags.Instance);
            }

            static void Prefix(object __instance)
            {
                if (ballisticsPatched) return;

                try
                {
                    var bulletHandlerType = __instance.GetType();
                    var ballisticSettingsField = bulletHandlerType.GetField("ballisticSettings", 
                        BindingFlags.NonPublic | BindingFlags.Instance);
                    
                    if (ballisticSettingsField == null)
                    {
                        Debug.LogWarning("[FUSION UNLEASHED] ballisticSettings field not found");
                        return;
                    }
                    
                    var ballisticSettings = ballisticSettingsField.GetValue(__instance);
                    if (ballisticSettings == null)
                    {
                        Debug.LogWarning("[FUSION UNLEASHED] ballisticSettings instance is null");
                        return;
                    }

                    var maxDeltaField = ballisticSettings.GetType().GetField("MaximumDeltaTime", 
                        BindingFlags.Public | BindingFlags.Instance);
                    
                    if (maxDeltaField != null)
                    {
                        float currentValue = (float)maxDeltaField.GetValue(ballisticSettings);
                        
                        // Patch ANY restrictive value (anything < 0.1)
                        if (currentValue < 0.1f)
                        {
                            maxDeltaField.SetValue(ballisticSettings, 0.1f);
                            ballisticsPatched = true;
                            Debug.Log($"[FUSION UNLEASHED] ✓ BallisticSettings.MaximumDeltaTime: {currentValue:F8} → 0.1");
                            Debug.Log($"[FUSION UNLEASHED] ✓ Ballistics FPS limiter REMOVED!");
                        }
                        else
                        {
                            Debug.Log($"[FUSION UNLEASHED] MaximumDeltaTime already optimal: {currentValue:F8}");
                            ballisticsPatched = true;
                        }
                    }
                    else
                    {
                        Debug.LogWarning("[FUSION UNLEASHED] MaximumDeltaTime field not found");
                    }
                }
                catch (Exception ex)
                {
                    Debug.LogError($"[FUSION UNLEASHED] Ballistics patch failed: {ex.Message}");
                }
            }
        }
    }
}
