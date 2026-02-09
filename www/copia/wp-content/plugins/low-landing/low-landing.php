<?php
/**
 * Plugin Name:       Low Landing
 * Description:       Secci¢n inferior de la landing page con call-to-action para Centro de Vuelos.
 * Version:           0.1.0
 * Author:            Codex Assistant
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LowLanding')) {
    final class LowLanding
    {
        private const HANDLE = 'low-landing';
        private const ASSETS_VERSION = '0.1.2';

        public static function bootstrap(): void
        {
            $instance = new self();

            add_action('wp_enqueue_scripts', [$instance, 'register_assets']);
            add_shortcode('low_landing_hero', [$instance, 'render_shortcode']);
            add_shortcode('quienes_somos_page', [$instance, 'render_quienes_shortcode']);
            add_shortcode('servicios_page', [$instance, 'render_servicios_shortcode']);
            add_shortcode('protocolos_page', [$instance, 'render_protocolos_shortcode']);
            add_shortcode('contacto_page', [$instance, 'render_contacto_shortcode']);
            add_shortcode('footer', [$instance, 'render_footer_shortcode']);
        }

        public function register_assets(): void
        {
            $base_url = plugins_url('assets/', __FILE__);

            wp_register_style(
                self::HANDLE . '-fonts',
                'https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Nunito:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap',
                [],
                null
            );

            wp_register_style(
                self::HANDLE,
                $base_url . 'css/low-landing.css',
                [self::HANDLE . '-fonts'],
                self::ASSETS_VERSION . '-' . time() // Force reload with timestamp
            );
            
            // Enqueue styles on all pages
            wp_enqueue_style(self::HANDLE . '-fonts');
            wp_enqueue_style(self::HANDLE);

            wp_register_script(
                self::HANDLE . '-i18n',
                $base_url . 'js/ll-i18n.js',
                [],
                self::ASSETS_VERSION . '-' . time(),
                true
            );
            
            // Pass the asset base URL to JS so we can swap images
            wp_localize_script(self::HANDLE . '-i18n', 'LL_Data', [
                'assetBase' => $base_url . 'images/'
            ]);

            wp_enqueue_script(self::HANDLE . '-i18n');
        }

        public function render_shortcode(array $atts = []): string
        {
            $defaults = [
                'background' => '',
                'overlay' => '',
                'cta_url' => '#',
                'cta_label' => __('Ver m s', 'low-landing'),
            ];

            $atts = shortcode_atts($defaults, $atts, 'low_landing_hero');

            wp_enqueue_style(self::HANDLE);

            $background_value = $this->resolve_layer_value($atts['background'], $this->default_background_value());
            $overlay_value = $this->resolve_layer_value($atts['overlay'], $this->default_overlay_value());
            $cta_label = esc_html($atts['cta_label']);
            $cta_url = esc_url($atts['cta_url']);

            $style = sprintf(
                '--ll-hero-background: %s; --ll-hero-overlay: %s;',
                esc_attr($background_value),
                esc_attr($overlay_value)
            );

            $weather_widget = '';

            if (shortcode_exists('puente_alto_weather')) {
                $weather_widget = do_shortcode('[puente_alto_weather]');
            }

            return $this->render_template('hero', [
                'style' => $style,
                'cta_label' => $cta_label,
                'cta_url' => $cta_url,
                'weather_widget' => $weather_widget,
            ]);
        }

        public function render_quienes_shortcode(array $atts = []): string
        {
            wp_enqueue_style(self::HANDLE);

            return $this->render_template('quienes', []);
        }

        public function render_servicios_shortcode(array $atts = []): string
        {
            wp_enqueue_style(self::HANDLE);

            return $this->render_template('servicios', []);
        }

        public function render_protocolos_shortcode(array $atts = []): string
        {
            wp_enqueue_style(self::HANDLE);

            return $this->render_template('protocolos', []);
        }

        public function render_contacto_shortcode(array $atts = []): string
        {
            wp_enqueue_style(self::HANDLE);

            return $this->render_template('contacto', []);
        }

        public function render_footer_shortcode(array $atts = []): string
        {
            $defaults = [];
            $atts = shortcode_atts($defaults, $atts, 'footer');

            wp_enqueue_style(self::HANDLE);

            return $this->render_template('footer', []);
        }

        private function resolve_layer_value(string $value, string $fallback): string
        {
            $value = trim($value);

            if ('' === $value) {
                return $fallback;
            }

            if (filter_var($value, FILTER_VALIDATE_URL)) {
                return sprintf("url('%s')", esc_url_raw($value));
            }

            $relative = ltrim($value, '/');
            $relative = preg_replace('#\.\.+#', '', $relative);
            $path = plugin_dir_path(__FILE__) . 'assets/images/' . $relative;

            if (file_exists($path)) {
                $url = plugins_url('assets/images/' . $relative, __FILE__);
                return sprintf("url('%s')", esc_url_raw($url));
            }

            return $fallback;
        }

        private function default_background_value(): string
        {
            $path = plugin_dir_path(__FILE__) . 'assets/images/fondo_start.png';

            if (file_exists($path)) {
                $url = plugins_url('assets/images/fondo_start.png', __FILE__);
                return sprintf("url('%s')", esc_url_raw($url));
            }

            return 'linear-gradient(120deg, #101222 0%, #3a1b31 50%, #730217 100%)';
        }

        private function default_overlay_value(): string
        {
            $path = plugin_dir_path(__FILE__) . 'assets/images/fondo_oscuro.png';

            if (file_exists($path)) {
                $url = plugins_url('assets/images/fondo_oscuro.png', __FILE__);
                return sprintf("url('%s')", esc_url_raw($url));
            }

            return 'linear-gradient(90deg, rgba(23, 22, 35, 0.85) 0%, rgba(23, 22, 35, 0.45) 50%, rgba(23, 22, 35, 0.85) 100%)';
        }

        private function render_template(string $template, array $vars = []): string
        {
            $template_path = plugin_dir_path(__FILE__) . 'templates/' . $template . '.php';

            if (!file_exists($template_path)) {
                return '';
            }

            $asset_base = plugins_url('assets/', __FILE__);

            if (!empty($vars)) {
                extract($vars, EXTR_SKIP);
            }

            ob_start();
            include $template_path;
            return trim((string) ob_get_clean());
        }
    }

    LowLanding::bootstrap();
}
