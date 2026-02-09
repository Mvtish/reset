<?php
/**
 * Script para convertir todas las imágenes a formato WebP
 * Ejecutar una vez desde el navegador o línea de comandos
 */

set_time_limit(300); // 5 minutos

// Directorio de imágenes
$imageDir = __DIR__ . '/wp-content/themes/danixpert/assets/images/';

// Verificar si GD soporta WebP
if (!function_exists('imagewebp')) {
    die('Error: La librería GD no tiene soporte para WebP. Actualiza PHP o habilita la extensión.');
}

echo "<!DOCTYPE html><html><head><meta charset='utf-8'><title>Conversión a WebP</title>";
echo "<style>body{font-family:Arial,sans-serif;max-width:800px;margin:50px auto;padding:20px;}";
echo ".success{color:green;}.error{color:red;}.info{color:blue;}</style></head><body>";
echo "<h1>Conversión de Imágenes a WebP</h1>";

// Función para convertir imagen a WebP
function convertToWebP($source, $destination, $quality = 85) {
    $info = getimagesize($source);
    
    if ($info === false) {
        return false;
    }
    
    $image = null;
    
    // Cargar la imagen según su tipo
    switch ($info['mime']) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            // Preservar transparencia
            imagealphablending($image, true);
            imagesavealpha($image, true);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            return false;
    }
    
    if ($image === null) {
        return false;
    }
    
    // Convertir a WebP
    $result = imagewebp($image, $destination, $quality);
    imagedestroy($image);
    
    return $result;
}

// Obtener todas las imágenes
$extensions = ['jpg', 'jpeg', 'png', 'gif'];
$images = [];

foreach ($extensions as $ext) {
    $files = glob($imageDir . '*.' . $ext);
    if ($files) {
        $images = array_merge($images, $files);
    }
}

if (empty($images)) {
    echo "<p class='error'>No se encontraron imágenes para convertir.</p>";
    echo "<p class='info'>Buscando en: " . htmlspecialchars($imageDir) . "</p>";
} else {
    echo "<p class='info'>Se encontraron " . count($images) . " imágenes para convertir.</p>";
    echo "<hr>";
    
    $converted = 0;
    $errors = 0;
    $totalOriginal = 0;
    $totalWebP = 0;
    
    foreach ($images as $imagePath) {
        $filename = basename($imagePath);
        $pathinfo = pathinfo($imagePath);
        $webpPath = $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '.webp';
        
        echo "<p><strong>" . htmlspecialchars($filename) . "</strong>: ";
        
        // Si ya existe el WebP, mostrar info
        if (file_exists($webpPath)) {
            $originalSize = filesize($imagePath);
            $webpSize = filesize($webpPath);
            $reduction = round((($originalSize - $webpSize) / $originalSize) * 100, 1);
            
            echo "<span class='info'>Ya existe (ahorro: {$reduction}%)</span>";
            $totalOriginal += $originalSize;
            $totalWebP += $webpSize;
        } else {
            // Convertir
            $originalSize = filesize($imagePath);
            
            if (convertToWebP($imagePath, $webpPath, 85)) {
                $webpSize = filesize($webpPath);
                $reduction = round((($originalSize - $webpSize) / $originalSize) * 100, 1);
                
                echo "<span class='success'>✓ Convertido (";
                echo number_format($originalSize / 1024, 1) . " KB → ";
                echo number_format($webpSize / 1024, 1) . " KB, ahorro: {$reduction}%)</span>";
                
                $converted++;
                $totalOriginal += $originalSize;
                $totalWebP += $webpSize;
            } else {
                echo "<span class='error'>✗ Error al convertir</span>";
                $errors++;
            }
        }
        
        echo "</p>";
        flush();
    }
    
    echo "<hr>";
    echo "<h2>Resumen</h2>";
    echo "<p class='success'>Imágenes convertidas: {$converted}</p>";
    
    if ($errors > 0) {
        echo "<p class='error'>Errores: {$errors}</p>";
    }
    
    if ($totalOriginal > 0) {
        $totalReduction = round((($totalOriginal - $totalWebP) / $totalOriginal) * 100, 1);
        echo "<p class='info'>Tamaño original total: " . number_format($totalOriginal / 1024 / 1024, 2) . " MB</p>";
        echo "<p class='info'>Tamaño WebP total: " . number_format($totalWebP / 1024 / 1024, 2) . " MB</p>";
        echo "<p class='success'><strong>Ahorro total: {$totalReduction}%</strong></p>";
    }
    
    echo "<hr>";
    echo "<p class='info'>¡Conversión completada! Ahora actualiza los archivos PHP para usar las extensiones .webp</p>";
}

echo "</body></html>";
?>
