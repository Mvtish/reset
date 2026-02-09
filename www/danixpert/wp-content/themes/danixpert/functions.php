<?php
/**
 * Danixpert Theme Functions
 */

// Cargar estilos y scripts
function danixpert_enqueue_scripts() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    $ver = function($relative_path) use ($theme_dir) {
        $path = $theme_dir . $relative_path;
        return file_exists($path) ? filemtime($path) : null;
    };

    // Google Fonts - Roboto y Sora
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&family=Sora:wght@400;600;700&display=swap', array(), null);
    
    // Estilo principal del tema
    wp_enqueue_style('danixpert-style', get_stylesheet_uri(), array(), $ver('/style.css'));
    
    // Estilos personalizados
    wp_enqueue_style('danixpert-navbar', $theme_uri . '/assets/css/navbar.css', array(), $ver('/assets/css/navbar.css'));
    wp_enqueue_style('danixpert-hero', $theme_uri . '/assets/css/hero-v2.css', array(), $ver('/assets/css/hero-v2.css'));
    wp_enqueue_style('danixpert-sectors', $theme_uri . '/assets/css/sectors.css', array(), $ver('/assets/css/sectors.css'));
    wp_enqueue_style('danixpert-services', $theme_uri . '/assets/css/services.css', array(), $ver('/assets/css/services.css'));
    wp_enqueue_style('danixpert-protection', $theme_uri . '/assets/css/protection.css', array(), $ver('/assets/css/protection.css'));
    wp_enqueue_style('danixpert-gallery', $theme_uri . '/assets/css/gallery.css', array(), $ver('/assets/css/gallery.css'));
    wp_enqueue_style('danixpert-works', $theme_uri . '/assets/css/works.css', array(), $ver('/assets/css/works.css'));
    wp_enqueue_style('danixpert-marcas', $theme_uri . '/assets/css/marcas.css', array(), $ver('/assets/css/marcas.css'));
    wp_enqueue_style('danixpert-footer', $theme_uri . '/assets/css/footer.css', array(), $ver('/assets/css/footer.css'));
    wp_enqueue_style('danixpert-whatsapp-fab', $theme_uri . '/assets/css/whatsapp-fab.css', array(), $ver('/assets/css/whatsapp-fab.css'));
    wp_enqueue_style('danixpert-lazy-load', $theme_uri . '/assets/css/lazy-load.css', array(), $ver('/assets/css/lazy-load.css'));
    
    // JavaScript personalizado
    wp_enqueue_script('danixpert-navbar-js', $theme_uri . '/assets/js/navbar.js', array('jquery'), $ver('/assets/js/navbar.js'), true);
    wp_enqueue_script('danixpert-hero-js', $theme_uri . '/assets/js/hero.js', array('jquery'), $ver('/assets/js/hero.js'), true);
    wp_enqueue_script('danixpert-works-js', $theme_uri . '/assets/js/works.js', array(), $ver('/assets/js/works.js'), true);
    wp_enqueue_script('danixpert-sectors-js', $theme_uri . '/assets/js/sectors.js', array('jquery'), $ver('/assets/js/sectors.js'), true);
    wp_enqueue_script('danixpert-gallery-js', $theme_uri . '/assets/js/gallery.js', array('jquery'), $ver('/assets/js/gallery.js'), true);
    wp_enqueue_script('danixpert-whatsapp-fab-js', $theme_uri . '/assets/js/whatsapp-fab.js', array(), $ver('/assets/js/whatsapp-fab.js'), true);
    wp_enqueue_script('danixpert-lazy-load-js', $theme_uri . '/assets/js/lazy-load.js', array(), $ver('/assets/js/lazy-load.js'), true);
}
add_action('wp_enqueue_scripts', 'danixpert_enqueue_scripts');

// Forzar revalidación del HTML en el frontend para que cargue querystrings nuevos de assets
function danixpert_no_cache_html_headers() {
    if (is_admin()) return;
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
}
add_action('send_headers', 'danixpert_no_cache_html_headers');

// Soporte para características del tema
function danixpert_theme_setup() {
    // Soporte para título del sitio
    add_theme_support('title-tag');
    
    // Soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Soporte para logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Registro de menús
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'danixpert'),
    ));
}
add_action('after_setup_theme', 'danixpert_theme_setup');

// Deshabilitar la barra de administración en el front-end
add_filter('show_admin_bar', '__return_false');

function danixpert_render_whatsapp_fab() {
    if (is_admin()) return;

    $phone = '56998549337';
    $message = 'Hola, me gustaría cotizar.';
    $url = 'https://wa.me/' . $phone . '?text=' . rawurlencode($message);

    echo '<a id="whatsappFab" class="whatsapp-fab" href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" aria-label="Hablar por WhatsApp" data-corner="bottom-right">';
    echo '<svg class="whatsapp-fab__icon" width="28" height="28" viewBox="0 0 24 24" aria-hidden="true" focusable="false">';
    echo '<path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>';
    echo '</svg>';
    echo '</a>';
}
add_action('wp_footer', 'danixpert_render_whatsapp_fab', 5);

// Habilitar lazy loading nativo para imágenes
function danixpert_add_lazy_loading($content) {
    if (is_singular() || is_archive() || is_home()) {
        $content = preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
    }
    return $content;
}
add_filter('the_content', 'danixpert_add_lazy_loading');

// Optimizar carga de scripts
function danixpert_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array(
        'danixpert-works-js',
        'danixpert-sectors-js',
        'danixpert-gallery-js'
    );
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'danixpert_defer_scripts', 10, 3);

// Habilitar caché del navegador
function danixpert_browser_cache() {
    if (!is_admin()) {
        header('Cache-Control: public, max-age=31536000');
    }
}
add_action('send_headers', 'danixpert_browser_cache');

// Optimizar salida HTML
function danixpert_optimize_output($buffer) {
    if (stripos($buffer, '<img') !== false) {
        $buffer = preg_replace_callback('/<img\b[^>]*>/i', function($matches) {
            $tag = $matches[0];
            $lower = strtolower($tag);

            if (strpos($lower, 'loading=') === false) {
                $tag = preg_replace('/<img\b/i', '<img loading="lazy"', $tag, 1);
            }

            if (strpos($lower, 'decoding=') === false) {
                $tag = preg_replace('/<img\b/i', '<img decoding="async"', $tag, 1);
            }

            return $tag;
        }, $buffer);
    }

    $accept = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';
    if ($accept !== '' && strpos($accept, 'image/webp') !== false) {
        $theme_uri = get_template_directory_uri();
        $theme_dir = get_template_directory();
        $pattern = '#' . preg_quote($theme_uri, '#') . '/assets/images/([^"\']+)\.(jpe?g|png)#i';

        $buffer = preg_replace_callback($pattern, function($matches) use ($theme_dir, $theme_uri) {
            $encoded_base = $matches[1];
            $decoded_base = rawurldecode($encoded_base);
            $webp_path = $theme_dir . '/assets/images/' . $decoded_base . '.webp';

            if (file_exists($webp_path)) {
                return $theme_uri . '/assets/images/' . $encoded_base . '.webp';
            }

            return $matches[0];
        }, $buffer);
    }

    return $buffer;
}

// Comprimir salida HTML
function danixpert_compress_output() {
    if (!is_admin() && !wp_doing_ajax() && !is_feed()) {
        ob_start('ob_gzhandler');
        ob_start('danixpert_optimize_output');
    }
}
add_action('wp_loaded', 'danixpert_compress_output');

// Remover query strings de recursos estáticos para mejor caché
function danixpert_remove_query_strings($src) {
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'danixpert_remove_query_strings', 10, 1);
add_filter('script_loader_src', 'danixpert_remove_query_strings', 10, 1);

// SEO: Meta tags y descripciones optimizadas
function danixpert_add_seo_meta() {
    if (is_front_page() || is_home()) {
        echo '<meta name="description" content="Danixpert - Expertos en instalación de cámaras de seguridad, alarmas, redes WiFi, cableado estructurado y sistemas de protección. Certificación Hikvision. Soluciones profesionales para hogares y empresas en Chile.">' . "\n";
        echo '<meta name="keywords" content="cámaras de seguridad, alarmas, sistemas de seguridad, Hikvision, redes WiFi, cableado estructurado, fibra óptica, seguridad Chile, protección hogar, seguridad empresarial, danixpert">' . "\n";
        echo '<meta name="author" content="Danixpert">' . "\n";
        echo '<meta name="robots" content="index, follow">' . "\n";
        
        // Open Graph para redes sociales
        echo '<meta property="og:title" content="Danixpert - Expertos en Seguridad, Cámaras y Alarmas">' . "\n";
        echo '<meta property="og:description" content="Instalación profesional de cámaras, alarmas, redes WiFi y sistemas de seguridad. Certificación Hikvision. Protege tu hogar o empresa con tecnología de vanguardia.">' . "\n";
        echo '<meta property="og:type" content="website">' . "\n";
        echo '<meta property="og:url" content="' . home_url() . '">' . "\n";
        echo '<meta property="og:site_name" content="Danixpert">' . "\n";
        echo '<meta property="og:image" content="' . get_template_directory_uri() . '/assets/images/foto_carrusel1.png">' . "\n";
        echo '<meta property="og:locale" content="es_CL">' . "\n";
        
        // Twitter Cards
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:title" content="Danixpert - Expertos en Seguridad">' . "\n";
        echo '<meta name="twitter:description" content="Instalación de cámaras, alarmas y sistemas de seguridad profesionales en Chile.">' . "\n";
        echo '<meta name="twitter:image" content="' . get_template_directory_uri() . '/assets/images/foto_carrusel1.png">' . "\n";
        
        // Canonical URL
        echo '<link rel="canonical" href="' . home_url() . '">' . "\n";
        
        // Datos estructurados JSON-LD para Google
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => 'Danixpert',
            'description' => 'Expertos en instalación de cámaras de seguridad, alarmas y sistemas de protección',
            'url' => home_url(),
            'logo' => get_template_directory_uri() . '/assets/images/logo_seo.png',
            'image' => get_template_directory_uri() . '/assets/images/foto_carrusel1.png',
            'telephone' => '+56998549337',
            'priceRange' => '$$',
            'address' => array(
                '@type' => 'PostalAddress',
                'addressCountry' => 'CL'
            )
        );
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        
        // Schema adicional para el logo de la organización
        $orgSchema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Danixpert',
            'url' => home_url(),
            'logo' => get_template_directory_uri() . '/assets/images/logo_seo.png',
            'sameAs' => array()
        );
        echo '<script type="application/ld+json">' . json_encode($orgSchema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'danixpert_add_seo_meta', 1);

// Generar sitemap.xml dinámicamente
function danixpert_generate_sitemap() {
    if (isset($_GET['sitemap']) && $_GET['sitemap'] == 'xml') {
        header('Content-Type: application/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        echo '  <url>' . "\n";
        echo '    <loc>' . home_url() . '</loc>' . "\n";
        echo '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
        echo '    <changefreq>weekly</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
        echo '</urlset>' . "\n";
        exit;
    }
}
add_action('template_redirect', 'danixpert_generate_sitemap');
?>
