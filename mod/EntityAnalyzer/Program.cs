using System;
using System.Collections.Generic;
using System.Linq;
using Mono.Cecil;

class EntityAnalyzer
{
    static void Main(string[] args)
    {
        string dllPath = @"C:\Program Files (x86)\Steam\steamapps\common\Sunkenland\Sunkenland_Data\Managed\Assembly-CSharp.dll";
        
        Console.WriteLine("=== ANALIZADOR DE ENTIDADES DE SUNKENLAND ===\n");
        Console.WriteLine($"Analizando: {dllPath}\n");
        
        var module = ModuleDefinition.ReadModule(dllPath);
        
        var allTypes = module.Types.Where(t => t.IsClass && !t.IsAbstract).ToList();
        
        // Buscar posibles entidades por nombre
        Console.WriteLine("=== ENEMIGOS / HOSTILES ===");
        var enemies = allTypes.Where(t => 
            t.Name.Contains("Enemy") || 
            t.Name.Contains("Army") || 
            t.Name.Contains("Slaver") || 
            t.Name.Contains("Settler") ||
            t.Name.Contains("Bandit") ||
            t.Name.Contains("Pirate") ||
            t.Name.Contains("Raider") ||
            t.Name.Contains("Hostile")
        ).OrderBy(t => t.Name);
        
        foreach (var enemy in enemies)
        {
            Console.WriteLine($"  - {enemy.Name} (Namespace: {enemy.Namespace})");
        }
        
        Console.WriteLine("\n=== ANIMALES / CRIATURAS ===");
        var animals = allTypes.Where(t => 
            t.Name.Contains("Shark") || 
            t.Name.Contains("Fish") || 
            t.Name.Contains("Crab") || 
            t.Name.Contains("Bird") ||
            t.Name.Contains("Seagull") ||
            t.Name.Contains("Eagle") ||
            t.Name.Contains("Marlin") ||
            t.Name.Contains("Piranha") ||
            t.Name.Contains("Turtle") ||
            t.Name.Contains("Dolphin") ||
            t.Name.Contains("Whale") ||
            t.Name.Contains("Animal") ||
            t.Name.Contains("Creature") ||
            t.Name.Contains("Wildlife")
        ).OrderBy(t => t.Name);
        
        foreach (var animal in animals)
        {
            Console.WriteLine($"  - {animal.Name} (Namespace: {animal.Namespace})");
        }
        
        Console.WriteLine("\n=== VEHÍCULOS ===");
        var vehicles = allTypes.Where(t => 
            t.Name.Contains("Boat") || 
            t.Name.Contains("Vehicle") || 
            t.Name.Contains("Raft") ||
            t.Name.Contains("Ship") ||
            t.Name.Contains("Jetski") ||
            t.Name.Contains("Helicopter") ||
            t.Name.Contains("Plane")
        ).OrderBy(t => t.Name);
        
        foreach (var vehicle in vehicles)
        {
            Console.WriteLine($"  - {vehicle.Name} (Namespace: {vehicle.Namespace})");
        }
        
        Console.WriteLine("\n=== ESTRUCTURAS / OBJETOS ===");
        var structures = allTypes.Where(t => 
            t.Name.Contains("Chest") || 
            t.Name.Contains("Storage") || 
            t.Name.Contains("Bed") ||
            t.Name.Contains("Buoy") ||
            t.Name.Contains("Container") ||
            t.Name.Contains("Workstation") ||
            t.Name.Contains("Crafting")
        ).OrderBy(t => t.Name);
        
        foreach (var structure in structures)
        {
            Console.WriteLine($"  - {structure.Name} (Namespace: {structure.Namespace})");
        }
        
        Console.WriteLine("\n=== CLASES BASE / MANAGERS ===");
        var bases = allTypes.Where(t => 
            t.Name.Contains("Player") || 
            t.Name.Contains("Character") ||
            t.Name.Contains("Entity") ||
            t.Name.Contains("AI") ||
            t.Name.Contains("NPC") ||
            (t.Name.Contains("Manager") && (t.Name.Contains("Entity") || t.Name.Contains("Spawn") || t.Name.Contains("AI")))
        ).OrderBy(t => t.Name);
        
        foreach (var baseClass in bases)
        {
            Console.WriteLine($"  - {baseClass.Name} (Namespace: {baseClass.Namespace})");
            
            // Mostrar si tiene campos interesantes
            var hasTransform = baseClass.Fields.Any(f => f.FieldType.Name.Contains("Transform"));
            var hasHealth = baseClass.Fields.Any(f => f.Name.ToLower().Contains("health"));
            if (hasTransform || hasHealth)
            {
                Console.WriteLine($"    [Transform: {hasTransform}, Health: {hasHealth}]");
            }
        }
        
        // Buscar MonoBehaviours con nombres tipo GameObject
        Console.WriteLine("\n=== POSIBLES PREFABS (MonoBehaviour con nombres simples) ===");
        var prefabs = allTypes.Where(t => 
            t.BaseType != null && 
            t.BaseType.Name == "MonoBehaviour" &&
            t.Name.Length < 20 &&
            !t.Name.Contains("Manager") &&
            !t.Name.Contains("Controller") &&
            !t.Name.Contains("System") &&
            !t.Name.Contains("UI")
        ).Take(50).OrderBy(t => t.Name);
        
        foreach (var prefab in prefabs)
        {
            Console.WriteLine($"  - {prefab.Name}");
        }
        
        Console.WriteLine("\n=== ANÁLISIS COMPLETADO ===");
        Console.WriteLine("\nPresiona cualquier tecla para salir...");
        Console.ReadKey();
    }
}
