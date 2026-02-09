<?php
/**
 * Plugin Name:       Puente Alto Weather Widget
 * Description:       Widget de clima para Puente Alto con datos de Open-Meteo. Usa el shortcode [puente_alto_weather].
 * Version:           0.1.0
 * Author:            Matias
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! class_exists('PuenteAltoWeatherWidget')) {
    final class PuenteAltoWeatherWidget
    {
        private static $inline_styles_printed = false;
        private const TRANSIENT_KEY = 'puentealto_weather_widget_data';
        private const CACHE_TTL     = 1800; // 30 minutos.
        private const API_URL       = 'https://api.open-meteo.com/v1/forecast?latitude=-33.6117&longitude=-70.5758&current=temperature_2m,weather_code&daily=temperature_2m_max,weather_code&timezone=auto';
        private const PAGE_OPTION   = 'puentealto_weather_widget_page_id';
        private const PAGE_SLUG     = 'puente-alto-clima';
        private const PAGE_TITLE    = 'Clima en Puente Alto';

        private const WEATHER_MAP = [
            0  => ['label' => 'Despejado', 'icon' => 'sun'],
            1  => ['label' => 'Mayormente despejado', 'icon' => 'sun'],
            2  => ['label' => 'Parcialmente nublado', 'icon' => 'cloud-sun'],
            3  => ['label' => 'Nublado', 'icon' => 'cloud'],
            45 => ['label' => 'Niebla', 'icon' => 'fog'],
            48 => ['label' => 'Niebla', 'icon' => 'fog'],
            51 => ['label' => 'Llovizna ligera', 'icon' => 'rain'],
            53 => ['label' => 'Llovizna', 'icon' => 'rain'],
            55 => ['label' => 'Llovizna intensa', 'icon' => 'rain'],
            56 => ['label' => 'Llovizna helada', 'icon' => 'rain'],
            57 => ['label' => 'Llovizna helada', 'icon' => 'rain'],
            61 => ['label' => 'Lluvia ligera', 'icon' => 'rain'],
            63 => ['label' => 'Lluvia', 'icon' => 'rain'],
            65 => ['label' => 'Lluvia fuerte', 'icon' => 'rain'],
            66 => ['label' => 'Lluvia helada', 'icon' => 'rain'],
            67 => ['label' => 'Lluvia helada intensa', 'icon' => 'rain'],
            71 => ['label' => 'Nieve ligera', 'icon' => 'snow'],
            73 => ['label' => 'Nieve', 'icon' => 'snow'],
            75 => ['label' => 'Nieve intensa', 'icon' => 'snow'],
            77 => ['label' => 'Granulos de nieve', 'icon' => 'snow'],
            80 => ['label' => 'Chubascos ligeros', 'icon' => 'rain'],
            81 => ['label' => 'Chubascos', 'icon' => 'rain'],
            82 => ['label' => 'Chubascos fuertes', 'icon' => 'rain'],
            85 => ['label' => 'Chubascos de nieve', 'icon' => 'snow'],
            86 => ['label' => 'Chubascos de nieve', 'icon' => 'snow'],
            95 => ['label' => 'Tormenta', 'icon' => 'storm'],
            96 => ['label' => 'Tormenta con granizo ligero', 'icon' => 'storm'],
            99 => ['label' => 'Tormenta con granizo', 'icon' => 'storm'],
        ];

        public static function bootstrap(): void
        {
            $plugin = new self();

            add_shortcode('puente_alto_weather', [$plugin, 'render_shortcode']);
            add_action('wp_enqueue_scripts', [$plugin, 'register_assets']);
            add_action('init', [$plugin, 'maybe_create_page']);
            add_filter('template_include', [$plugin, 'maybe_use_custom_template']);
        }

        public static function on_activation(): void
        {
            $plugin = new self();
            $plugin->ensure_page_exists();
        }

        public function register_assets(): void
        {
            $version = '0.1.0';
            $path    = plugin_dir_path(__FILE__) . 'assets/weather-widget.css';

            if (file_exists($path)) {
                $version = (string) filemtime($path);
            }

            wp_register_style(
                'puentealto-weather-widget',
                plugins_url('assets/weather-widget.css', __FILE__),
                [],
                $version
            );
        }

        public function maybe_create_page(): void
        {
            $stored_id = (int) get_option(self::PAGE_OPTION);

            if ($stored_id > 0) {
                $page = get_post($stored_id);

                if ($page instanceof WP_Post && 'trash' !== $page->post_status) {
                    return;
                }
            }

            $this->ensure_page_exists();
        }

        public function render_shortcode(): string
        {
            $weather = $this->get_weather_data();

            if (is_wp_error($weather)) {
                return sprintf(
                    '<div class="paw-widget paw-widget--error">%s</div>',
                    esc_html__('No se pudo cargar el clima en este momento.', 'puentealto-weather-widget')
                );
            }

            wp_enqueue_style('puentealto-weather-widget');

            $current     = $weather['current'];
            $daily       = $weather['daily'];
            $description = $current['description'];

            ob_start();
            if (! self::$inline_styles_printed) {
                echo $this->render_inline_styles(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                self::$inline_styles_printed = true;
            }
            ?>
            <section class="paw-widget paw-widget--v2" aria-live="polite">
                <header class="paw-widget__header">
                    <div class="paw-widget__date">
                        <?php echo esc_html($this->format_date_display($current['time'])); ?>
                    </div>
                    <div class="paw-widget__temp">
                        <span class="paw-widget__temp-value"><?php echo esc_html(round($current['temperature'])); ?></span>
                        <span class="paw-widget__temp-unit">&deg;</span>
                        <span class="paw-widget__temp-scale">C</span>
                    </div>
                    <div class="paw-widget__status">
                        <?php echo $this->render_icon($current['icon']); ?>
                        <span class="paw-widget__status-label"><?php echo esc_html__('HOY', 'puentealto-weather-widget'); ?></span>
                    </div>
                </header>
                <div class="paw-widget__forecast" role="list">
                    <?php foreach ($daily as $day) : ?>
                        <article class="paw-widget__forecast-day" role="listitem">
                            <div class="paw-widget__forecast-icon">
                                <?php echo $this->render_icon($day['icon']); ?>
                            </div>
                            <div class="paw-widget__forecast-temp"><?php echo esc_html(round($day['temperature'])); ?>&deg;</div>
                            <div class="paw-widget__forecast-dayname"><?php echo esc_html($day['day']); ?></div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <footer class="paw-widget__location">
                    <span class="paw-widget__location-label"><?php echo esc_html__('Ubicación:', 'puentealto-weather-widget'); ?></span>
                    <a class="paw-widget__location-link" href="https://maps.app.goo.gl/TvT5sVLC3enS6c1x6" target="_blank" rel="noopener">
                        <?php echo esc_html__('Parapente Club - Camino A San José del Maipo 07820, 9460000 Puente Alto, San José de Maipo, Región Metropolitana', 'puentealto-weather-widget'); ?>
                    </a>
                    <div class="paw-widget__map">
                        <iframe title="<?php echo esc_attr__('Mapa Parapente Club', 'puentealto-weather-widget'); ?>" src="https://www.google.com/maps?q=-33.59733193001917,-70.50430920072101&amp;z=16&amp;hl=es&amp;output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </footer>
            </section>
            <?php

            return (string) ob_get_clean();
        }

        public function maybe_use_custom_template(string $template): string
        {
            if (is_page(self::PAGE_SLUG)) {
                $custom = plugin_dir_path(__FILE__) . 'templates/widget-only.php';

                if (file_exists($custom)) {
                    return $custom;
                }
            }

            return $template;
        }

        private function get_weather_data()
        {
            $cached = get_transient(self::TRANSIENT_KEY);

            if (false !== $cached) {
                return $cached;
            }

            $response = wp_remote_get(self::API_URL, ['timeout' => 12]);

            if (is_wp_error($response)) {
                return $response;
            }

            $status_code = (int) wp_remote_retrieve_response_code($response);

            if (200 !== $status_code) {
                return new WP_Error('paww_bad_status', 'Weather API error.');
            }

            $body = wp_remote_retrieve_body($response);
            $json = json_decode($body, true);

            if (! is_array($json) || empty($json['current']) || empty($json['daily'])) {
                return new WP_Error('paww_invalid_json', 'Weather API returned unexpected data.');
            }

            $current_code = (int) ($json['current']['weather_code'] ?? -1);
            $current_time = isset($json['current']['time']) ? strtotime($json['current']['time']) : time();
            $current_temp = (float) ($json['current']['temperature_2m'] ?? 0);

            $current = [
                'temperature' => $current_temp,
                'time'        => $current_time,
                'description' => $this->describe_weather_code($current_code),
                'icon'        => $this->icon_for_code($current_code),
            ];

            $daily = [];
            $daily_times  = $json['daily']['time'] ?? [];
            $daily_temps  = $json['daily']['temperature_2m_max'] ?? [];
            $daily_codes  = $json['daily']['weather_code'] ?? [];

            $days_count = min(count($daily_times), count($daily_temps), count($daily_codes));

            for ($i = 0; $i < $days_count && count($daily) < 5; $i++) {
                $timestamp = strtotime($daily_times[$i] ?? '');

                if (! $timestamp) {
                    continue;
                }

                $daily[] = [
                    'day'        => $this->format_day_name($timestamp),
                    'temperature'=> (float) $daily_temps[$i],
                    'icon'       => $this->icon_for_code((int) $daily_codes[$i]),
                ];
            }

            $payload = [
                'current' => $current,
                'daily'   => $daily,
            ];

            set_transient(self::TRANSIENT_KEY, $payload, self::CACHE_TTL);

            return $payload;
        }

        private function describe_weather_code(int $code): string
        {
            if (isset(self::WEATHER_MAP[$code])) {
                return self::WEATHER_MAP[$code]['label'];
            }

            return __('Condicion desconocida', 'puentealto-weather-widget');
        }

        private function icon_for_code(int $code): string
        {
            if (isset(self::WEATHER_MAP[$code])) {
                return self::WEATHER_MAP[$code]['icon'];
            }

            return 'cloud';
        }

        private function format_day_name(int $timestamp): string
        {
            $day = wp_date('l', $timestamp);

            return $this->title_case($day);
        }

        private function format_date_display(int $timestamp): string
        {
            $date_format = 'l j \d\e F';
            $formatted   = wp_date($date_format, $timestamp);

            return $this->title_case($formatted);
        }

        private function title_case(string $value): string
        {
            if (function_exists('mb_convert_case')) {
                return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
            }

            return ucwords($value);
        }

        private function render_icon(string $type): string
        {
            $icons = [
                'sun'       => '<svg aria-hidden="true" viewBox="0 0 64 64"><circle cx="32" cy="32" r="15" fill="currentColor"></circle><g stroke="currentColor" stroke-width="4" stroke-linecap="round"><line x1="32" y1="4" x2="32" y2="14"></line><line x1="32" y1="50" x2="32" y2="60"></line><line x1="4" y1="32" x2="14" y2="32"></line><line x1="50" y1="32" x2="60" y2="32"></line><line x1="11" y1="11" x2="18" y2="18"></line><line x1="46" y1="46" x2="53" y2="53"></line><line x1="11" y1="53" x2="18" y2="46"></line><line x1="46" y1="18" x2="53" y2="11"></line></g></svg>',
                'cloud'     => '<svg aria-hidden="true" viewBox="0 0 64 64"><path fill="currentColor" d="M22 50h24a12 12 0 0 0 0-24 16 16 0 0 0-31.3-4A12 12 0 0 0 22 50Z"></path></svg>',
                'cloud-sun' => '<svg aria-hidden="true" viewBox="0 0 64 64"><path fill="currentColor" d="M22 50h24a12 12 0 0 0 0-24 16 16 0 0 0-31.3-4A12 12 0 0 0 22 50Z"></path><circle cx="18" cy="20" r="10" fill="currentColor"></circle></svg>',
                'rain'      => '<svg aria-hidden="true" viewBox="0 0 64 64"><path fill="currentColor" d="M22 42h24a12 12 0 0 0 0-24 16 16 0 0 0-31.3-4A12 12 0 0 0 22 42Z"></path><g stroke="currentColor" stroke-width="4" stroke-linecap="round"><line x1="20" y1="48" x2="16" y2="58"></line><line x1="32" y1="48" x2="28" y2="58"></line><line x1="44" y1="48" x2="40" y2="58"></line></g></svg>',
                'snow'      => '<svg aria-hidden="true" viewBox="0 0 64 64"><path fill="currentColor" d="M22 42h24a12 12 0 0 0 0-24 16 16 0 0 0-31.3-4A12 12 0 0 0 22 42Z"></path><g stroke="currentColor" stroke-width="3" stroke-linecap="round"><line x1="22" y1="50" x2="16" y2="58"></line><line x1="22" y1="50" x2="16" y2="44"></line><line x1="32" y1="50" x2="26" y2="58"></line><line x1="32" y1="50" x2="26" y2="44"></line><line x1="42" y1="50" x2="36" y2="58"></line><line x1="42" y1="50" x2="36" y2="44"></line></g></svg>',
                'storm'     => '<svg aria-hidden="true" viewBox="0 0 64 64"><path fill="currentColor" d="M22 42h24a12 12 0 0 0 0-24 16 16 0 0 0-31.3-4A12 12 0 0 0 22 42Z"></path><polygon fill="currentColor" points="28 44 22 56 34 50 30 60 42 44"></polygon></svg>',
                'fog'       => '<svg aria-hidden="true" viewBox="0 0 64 64"><path fill="currentColor" d="M22 38h24a12 12 0 0 0 0-24 16 16 0 0 0-31.3-4A12 12 0 0 0 22 38Z"></path><rect x="14" y="46" width="36" height="4" rx="2" fill="currentColor"></rect><rect x="10" y="54" width="36" height="4" rx="2" fill="currentColor"></rect></svg>',
            ];

            $svg = $icons[$type] ?? $icons['cloud'];

            return sprintf('<span class="paw-icon paw-icon--%1$s">%2$s</span>', esc_attr($type), $svg);
        }

        private function render_inline_styles(): string
        {
            $css = <<<CSS
<style id="puentealto-weather-widget-inline-css">
.paw-widget--v2 {
    box-sizing: border-box;
    margin: 0 auto;
    max-width: 723px;
    padding: 60px 64px 60px;
    border-radius: 32px;
    box-shadow: 0 24px 48px rgba(0, 0, 0, 0.22);
    font-family: "Poppins", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}
.paw-widget--v2 *,
.paw-widget--v2 *::before,
.paw-widget--v2 *::after {
    box-sizing: inherit;
    font-family: inherit;
}
.paw-widget--v2 .paw-widget__temp-value,
.paw-widget--v2 .paw-widget__temp-unit,
.paw-widget--v2 .paw-widget__temp-scale {
    font-weight: 600;
}
.paw-widget--v2 .paw-widget__forecast {
    display: flex;
    justify-content: center;
    align-items: stretch;
    gap: 20px;
    padding: 14px 36px 6px;
    margin-top: 23px;
}
.paw-widget--v2 .paw-widget__forecast-day {
    border-radius: 33px;
    box-shadow: 0 16px 24px rgba(0, 0, 0, 0.16);
    margin: 0;
}
.paw-widget--v2 .paw-widget__forecast-temp,
.paw-widget--v2 .paw-widget__forecast-dayname {
    font-weight: 400;
}
.paw-widget--v2 .paw-widget__location {
    margin-top: 28px;
    text-align: center;
    font-size: 15px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 6px;
}
.paw-widget--v2 .paw-widget__location-label {
    font-weight: 600;
}
.paw-widget--v2 .paw-widget__location-link {
    color: inherit;
    text-decoration: underline;
    text-decoration-thickness: 1px;
    text-underline-offset: 4px;
}
.paw-widget--v2 .paw-widget__location-link:hover,
.paw-widget--v2 .paw-widget__location-link:focus {
    color: inherit;
    text-decoration-thickness: 2px;
}
.paw-widget--v2 .paw-widget__map {
    margin-top: 16px;
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 18px 30px rgba(0, 0, 0, 0.18);
}
.paw-widget--v2 .paw-widget__map iframe {
    width: 100%;
    height: 220px;
    border: 0;
    display: block;
}
</style>
CSS;

            return $css;
        }

        private function ensure_page_exists(): void
        {
            $existing = get_page_by_path(self::PAGE_SLUG);

            if ($existing instanceof WP_Post && 'trash' !== $existing->post_status) {
                update_option(self::PAGE_OPTION, (int) $existing->ID, false);
                return;
            }

            $page_id = wp_insert_post([
                'post_title'   => self::PAGE_TITLE,
                'post_name'    => self::PAGE_SLUG,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '[puente_alto_weather]',
            ], true);

            if (is_wp_error($page_id) || ! $page_id) {
                return;
            }

            update_option(self::PAGE_OPTION, (int) $page_id, false);
        }
    }

    register_activation_hook(__FILE__, ['PuenteAltoWeatherWidget', 'on_activation']);
    PuenteAltoWeatherWidget::bootstrap();
}
