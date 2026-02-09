using System;
using System.Reflection;
using BepInEx;
using BepInEx.Configuration;
using BepInEx.Logging;
using HarmonyLib;
using UnityEngine;

namespace FastHarvestMod
{
    [BepInPlugin("com.matia.sunkenland.fastharvest", "Fast Harvest", "1.0.0")]
    public class FastHarvestMod : BaseUnityPlugin
    {
        public static FastHarvestMod Instance { get; private set; }
        
        private ConfigEntry<float> _growthSpeedMultiplier;
        private ConfigEntry<float> _minimumGrowthTime;
        
        public ManualLogSource Log => Logger;
        
        private void Awake()
        {
            Instance = this;
            
            // Configuration
            _growthSpeedMultiplier = Config.Bind("General", "GrowthSpeedMultiplier", 5f,
                "Multiplier for plant growth speed (higher = faster). Default: 5x");
            
            _minimumGrowthTime = Config.Bind("General", "MinimumGrowthTime", 30f,
                "Minimum growth time in seconds. Default: 30s");
            
            try
            {
                var harmony = new Harmony("com.matia.sunkenland.fastharvest");
                
                // Load Assembly-CSharp
                var assemblyCSharp = Assembly.Load("Assembly-CSharp");
                Type planterType = assemblyCSharp.GetType("Planter");
                
                if (planterType != null)
                {
                    Log.LogInfo($"Found Planter type: {planterType.Name}");
                    
                    // Patch RPC_AskForPlanting - called when player plants a seed
                    var rpcPlantingMethod = planterType.GetMethod("RPC_AskForPlanting", BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Instance);
                    if (rpcPlantingMethod != null)
                    {
                        var postfixMethod = typeof(PlantSeedPatch).GetMethod("Postfix", BindingFlags.Public | BindingFlags.Static);
                        harmony.Patch(rpcPlantingMethod, postfix: new HarmonyMethod(postfixMethod));
                        Log.LogInfo("Patched RPC_AskForPlanting");
                    }
                    else
                    {
                        Log.LogWarning("Could not find RPC_AskForPlanting method!");
                    }
                    
                    // Patch FixedUpdateNetwork - accelerate growth timer
                    var fixedUpdateMethod = planterType.GetMethod("FixedUpdateNetwork", BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Instance);
                    if (fixedUpdateMethod != null)
                    {
                        var postfixUpdateMethod = typeof(GrowthAccelerationPatch).GetMethod("Postfix", BindingFlags.Public | BindingFlags.Static);
                        harmony.Patch(fixedUpdateMethod, postfix: new HarmonyMethod(postfixUpdateMethod));
                        Log.LogInfo("Patched FixedUpdateNetwork");
                    }
                    
                    Log.LogInfo($"Fast Harvest loaded! Speed: {_growthSpeedMultiplier.Value}x, Min time: {_minimumGrowthTime.Value}s");
                }
                else
                {
                    Log.LogError("Could not find Planter type!");
                }
            }
            catch (Exception ex)
            {
                Log.LogError($"Error loading Fast Harvest: {ex}");
            }
        }
        
        public float GetGrowthSpeedMultiplier()
        {
            return _growthSpeedMultiplier.Value;
        }
        
        public float GetMinimumGrowthTime()
        {
            return _minimumGrowthTime.Value;
        }
    }

    // Patch to modify itemProduceDuration when seed is planted
    public class PlantSeedPatch
    {
        public static void Postfix(object __instance)
        {
            try
            {
                Type instanceType = __instance.GetType();
                var mod = FastHarvestMod.Instance;
                
                // Modify the itemProduceDuration field
                FieldInfo durationField = instanceType.GetField("itemProduceDuration", BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Instance);
                if (durationField != null)
                {
                    float originalDuration = (float)durationField.GetValue(__instance);
                    
                    if (originalDuration > 0)
                    {
                        float newDuration = 240f; // 4 minutes
                        
                        durationField.SetValue(__instance, newDuration);
                        mod.Log.LogInfo($"Seed planted! Growth duration: {originalDuration}s -> {newDuration}s");
                    }
                }
            }
            catch (Exception ex)
            {
                FastHarvestMod.Instance.Log.LogError($"Error in PlantSeedPatch: {ex}");
            }
        }
    }

    // Patch to accelerate the growth timer in FixedUpdateNetwork
    public class GrowthAccelerationPatch
    {
        public static void Postfix(object __instance)
        {
            try
            {
                Type instanceType = __instance.GetType();
                var mod = FastHarvestMod.Instance;
                
                // Check if there's a seed planted
                FieldInfo seedPlantedField = instanceType.GetField("_SeedPlanted", BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Instance);
                if (seedPlantedField != null)
                {
                    int seedId = (int)seedPlantedField.GetValue(__instance);
                    
                    // Only accelerate if a seed is planted
                    if (seedId > 0)
                    {
                        // Get the ItemProduceTimer field (_ItemProduceTimer is the backing field)
                        FieldInfo timerField = instanceType.GetField("_ItemProduceTimer", BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Instance);
                        if (timerField != null)
                        {
                            float currentTimer = (float)timerField.GetValue(__instance);
                            
                            // Accelerate the timer (multiply by growth speed multiplier)
                            // The timer counts up to itemProduceDuration, so we add more time each frame
                            float acceleration = Time.fixedDeltaTime * (mod.GetGrowthSpeedMultiplier() - 1f);
                            float newTimer = currentTimer + acceleration;
                            
                            timerField.SetValue(__instance, newTimer);
                        }
                    }
                }
            }
            catch (Exception)
            {
                // Silently catch errors to avoid spam
            }
        }
    }
}
