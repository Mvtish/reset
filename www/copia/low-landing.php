<?php
/**
 * Plugin Name:       Low Landing
 * Description:       Sección inferior de la landing page con call-to-action para Centro de Vuelos.
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
        private const ASSETS_VERSION = '0.1.0';

        public static function bootstrap(): void
        {
            $instance = new self();

            add_action('wp_enqueue_scripts', [$instance, 'register_assets']);
            add_shortcode('low_landing_hero', [$instance, 'render_shortcode']);
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
                self::ASSETS_VERSION
            );
        }

        public function render_shortcode(array $atts = []): string
        {
            $defaults = [
                'background' => '',
                'overlay' => '',
                'cta_url' => '#',
                'cta_label' => __('Ver más', 'low-landing'),
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

            ob_start();
            ?>
            <!-- Seccion Hero Aventura -->
            <section class="ll-section ll-section--adventure">
                <div class="ll-adventure">
                    <div class="ll-adventure__overlay"></div>

                                        <header class=\"ll-adventure__nav\">
                        <div class=\"ll-adventure__logo\"><?php esc_html_e('LOGO PARAPENTE', 'low-landing'); ?></div>
                        <nav class=\"ll-adventure__menu\">
                            <a href=\"#\"><?php esc_html_e('HOME', 'low-landing'); ?></a>
                            <a href=\"#\"><?php esc_html_e('¿QUIÉNES SOMOS?', 'low-landing'); ?></a>
                            <a href=\"#\"><?php esc_html_e('CONTACTO', 'low-landing'); ?></a>
                            <a href=\"#\"><?php esc_html_e('PROTOCOLOS', 'low-landing'); ?></a>
                            <a href=\"#\"><?php esc_html_e('SERVICIOS', 'low-landing'); ?></a>
                        </nav>
                        <div class=\"ll-adventure__lang\">
                            <img src=\"<?php echo esc_url(plugins_url('assets/images/espaniol.png', __FILE__)); ?>\" alt=\"<?php esc_attr_e('Bandera español', 'low-landing'); ?>\">
                            <span><?php esc_html_e('ES', 'low-landing'); ?></span>
                            <span class=\"ll-adventure__lang-icon\">▼</span>
                        </div>
                    </header>

                    <div class="ll-adventure__corners">
                        <img src="<?php echo esc_url(plugins_url('assets/images/Vector 4.png', __FILE__)); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--tl">
                        <img src="<?php echo esc_url(plugins_url('assets/images/Vector 3.png', __FILE__)); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--tr">
                        <img src="<?php echo esc_url(plugins_url('assets/images/Vector 1.png', __FILE__)); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--bl">
                        <img src="<?php echo esc_url(plugins_url('assets/images/Vector 2.png', __FILE__)); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--br">
                    </div>

                    <div class="ll-adventure__content">
                        <div class="ll-adventure__title">
                            <span class="ll-adventure__bullet">►</span>
                            <div>
                                <div class="ll-adventure__headline">
                                    <?php
                                    printf(
                                        /* translators: %s italic word */
                                        esc_html__('TU %s EN LAS', 'low-landing'),
                                        '<span class="ll-adventure__headline--accent">' . esc_html__('AVENTURA', 'low-landing') . '</span>'
                                    );
                                    ?>
                                </div>
                                <div class="ll-adventure__headline">
                                    <?php esc_html_e('VIZCACHAS CHILE', 'low-landing'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seccion Bienvenida Superior -->
            <section class="ll-section ll-section--welcome">
                <div class="ll-section__inner">
                    <div class="ll-welcome">
                        <div class="ll-welcome__header">
                            <h2 class="ll-welcome__title">
                                <?php esc_html_e('TE DAMOS LA BIENVENIDA AL CENTRO DE VUELO LAS VIZCACHAS DONDE TU EXPERIENCIA SERÁ INOLVIDABLE', 'low-landing'); ?>
                            </h2>
                            <p class="ll-welcome__subtitle">
                                <?php esc_html_e('Tu destino ideal para practicar parapente. Experimenta la emoción de volar en espectaculares paisajes de montaña.', 'low-landing'); ?>
                            </p>
                        </div>

                        <div class="ll-welcome__cards">
                            <article class="ll-welcome-card">
                                <div class="ll-welcome-card__image ll-welcome-card__image--one">
                                    <div class="ll-welcome-card__overlay">
                                        <div class="ll-welcome-card__badge-wrap">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tl" src="<?php echo esc_url(plugins_url('assets/images/esquina2.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tr" src="<?php echo esc_url(plugins_url('assets/images/esquina1.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--bl" src="<?php echo esc_url(plugins_url('assets/images/esquina4.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--br" src="<?php echo esc_url(plugins_url('assets/images/esquina3.png', __FILE__)); ?>" alt="">
                                            <span class="ll-welcome-card__badge">01</span>
                                        </div>
                                        <div class="ll-welcome-card__title">
                                            <?php esc_html_e('CONDICIONES PERFECTAS PARA VOLAR', 'low-landing'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="ll-welcome-card__body">
                                    <span class="ll-welcome-card__bullet">&#9656;</span>
                                    <p class="ll-welcome-card__text">
                                        <?php esc_html_e('Los patrones de viento y temperaturas térmicas óptimos hacen que este lugar sea ideal para parapentistas experimentados.', 'low-landing'); ?>
                                    </p>
                                </div>
                            </article>

                            <article class="ll-welcome-card">
                                <div class="ll-welcome-card__image ll-welcome-card__image--two">
                                    <div class="ll-welcome-card__overlay">
                                        <div class="ll-welcome-card__badge-wrap">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tl" src="<?php echo esc_url(plugins_url('assets/images/esquina2.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tr" src="<?php echo esc_url(plugins_url('assets/images/esquina1.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--bl" src="<?php echo esc_url(plugins_url('assets/images/esquina4.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--br" src="<?php echo esc_url(plugins_url('assets/images/esquina3.png', __FILE__)); ?>" alt="">
                                            <span class="ll-welcome-card__badge">02</span>
                                        </div>
                                        <div class="ll-welcome-card__title">
                                            <?php esc_html_e('GRANDIOSOS PAISAJES', 'low-landing'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="ll-welcome-card__body">
                                    <span class="ll-welcome-card__bullet">&#9656;</span>
                                    <p class="ll-welcome-card__text">
                                        <?php esc_html_e('Vuele sobre impresionantes cadenas montañosas, valles y una belleza natural impresionante.', 'low-landing'); ?>
                                    </p>
                                </div>
                            </article>

                            <article class="ll-welcome-card">
                                <div class="ll-welcome-card__image ll-welcome-card__image--three">
                                    <div class="ll-welcome-card__overlay">
                                        <div class="ll-welcome-card__badge-wrap">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tl" src="<?php echo esc_url(plugins_url('assets/images/esquina2.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tr" src="<?php echo esc_url(plugins_url('assets/images/esquina1.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--bl" src="<?php echo esc_url(plugins_url('assets/images/esquina4.png', __FILE__)); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--br" src="<?php echo esc_url(plugins_url('assets/images/esquina3.png', __FILE__)); ?>" alt="">
                                            <span class="ll-welcome-card__badge">03</span>
                                        </div>
                                        <div class="ll-welcome-card__title">
                                            <?php esc_html_e('LUGAR PARA EXPERTOS', 'low-landing'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="ll-welcome-card__body">
                                    <span class="ll-welcome-card__bullet">&#9656;</span>
                                    <p class="ll-welcome-card__text">
                                        <?php esc_html_e('Lugar reconocido por las comunidades de parapente como un destino de vuelo de primer nivel.', 'low-landing'); ?>
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seccion Destino -->
            <section class="ll-section ll-section--destination">
                <div class="ll-section__inner">
                    <div class="ll-destination">
                        <h2 class="ll-destination__title">
                            <?php esc_html_e('TU DESTINO DEFINITIVO PARA EL PARAPENTE', 'low-landing'); ?>
                        </h2>
                        <p class="ll-destination__description">
                            <?php esc_html_e('El Centro de Vuelo Las Vizcachas da la bienvenida a parapentistas experimentados de todo el mundo. Nuestra ubicacion ofrece condiciones de vuelo excepcionales, impresionantes paisajes montanosos y una comunidad solidaria que hace que cada vuelo sea inolvidable.', 'low-landing'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <!-- Seccion Temporadas y Clima -->
            <section class="ll-section ll-section--seasons">
                <div class="ll-section__inner">
                    <div class="ll-seasons">
                        <div class="ll-seasons__content">
                            <span class="ll-seasons__label"><?php esc_html_e('TEMPORADAS', 'low-landing'); ?></span>
                            <h2 class="ll-seasons__title">
                                <span class="ll-seasons__arrow">&#9656;</span>
                                <?php esc_html_e('CONOCE LAS TEMPORADAS PERFECTAS PARA VOLAR', 'low-landing'); ?>
                            </h2>
                            <div class="ll-seasons__periods">
                                <div class="ll-seasons__period">
                                    <h3 class="ll-seasons__period-title">
                                        <?php esc_html_e('TEMPORADA ALTA:', 'low-landing'); ?>
                                    </h3>
                                    <p class="ll-seasons__period-range">
                                        <?php esc_html_e('Septiembre - Marzo', 'low-landing'); ?>
                                    </p>
                                </div>
                                <div class="ll-seasons__period">
                                    <h3 class="ll-seasons__period-title">
                                        <?php esc_html_e('TEMPORADA BAJA:', 'low-landing'); ?>
                                    </h3>
                                    <p class="ll-seasons__period-range">
                                        <?php esc_html_e('Abril - Agosto', 'low-landing'); ?>
                                    </p>
                                </div>
                            </div>

                            <h2 class="ll-seasons__title ll-seasons__title--second">
                                <span class="ll-seasons__arrow">&#9656;</span>
                                <?php esc_html_e('REVISA EL CLIMA DE LOS PRÓXIMOS DÍAS', 'low-landing'); ?>
                            </h2>

                            <div class="ll-seasons__weather">
                                <?php echo $weather_widget; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        </div>

                        <div class="ll-seasons__image">
                            <img src="<?php echo esc_url(plugins_url('assets/images/temporadas.png', __FILE__)); ?>"
                                alt="<?php esc_attr_e('Foto de parapente en temporada', 'low-landing'); ?>">
                        </div>
                    </div>
                </div>
            </section>
            <!-- Seccion Tracks de Vuelos -->
            <section class="ll-section ll-section--tracks">
                <div class="ll-section__inner">
                    <div class="ll-tracks">
                        <span class="ll-tracks__label"><?php esc_html_e('TRACKS DE VUELOS', 'low-landing'); ?></span>
                        <h2 class="ll-tracks__title">
                            <span class="ll-tracks__arrow">&#9656;</span>
                            <?php esc_html_e('AQUÍ? PUEDES VER UN PAR DE VUELOS HECHOS EN EL CENTRO DE VUELO', 'low-landing'); ?>
                        </h2>
                        <div class="ll-tracks__map">
                            <img src="<?php echo esc_url(plugins_url('assets/images/tracks.png', __FILE__)); ?>"
                                alt="<?php esc_attr_e('Mapa de tracks de vuelos', 'low-landing'); ?>">
                        </div>
                        <p class="ll-tracks__description">
                            <?php esc_html_e('QUIERES SEGUIR VIENDO EXPERIENCIAS DE VUELOS', 'low-landing'); ?>
                        </p>
                        <a class="ll-tracks__cta" href="<?php echo esc_url('#'); ?>">
                            <?php esc_html_e('Ver má­s', 'low-landing'); ?>
                        </a>
                    </div>
                </div>
            </section>

            <div class="ll-hero-wrap">
                <section class="ll-hero" style="<?php echo $style; ?>">
                    <div class="ll-hero__content">
                        <span class="ll-hero__pretitle"><?php esc_html_e('Comienza ahora', 'low-landing'); ?></span>
                        <h2 class="ll-hero__title"><?php esc_html_e('¿Listo para volar?', 'low-landing'); ?></h2>
                        <p class="ll-hero__description">
                            <?php esc_html_e('Ya sea un piloto experimentado que busca su próxima aventura o que esté explorando nuestros servicios, estamos aquí para hacer que su experiencia de parapente sea excepcional.', 'low-landing'); ?>
                        </p>
                        <a class="ll-hero__cta" href="<?php echo $cta_url; ?>">
                            <?php echo $cta_label; ?>
                        </a>
                    </div>
                </section>
            </div>
            <section class="ll-section ll-section--info">
                <div class="ll-section__inner">
                    <div class="ll-services">
                        <!-- Columna izquierda: Contenido de texto -->
                        <div class="ll-services__content">
                            <span class="ll-services__label"><?php esc_html_e('SERVICIOS', 'low-landing'); ?></span>
                            <h2 class="ll-services__title">
                                <?php esc_html_e('¿NO ERES PARAPENTISTA Y TE GUSTARÍA VIVIR UNA EXPERIENCIA ÚNICA DE VOLAR?', 'low-landing'); ?>
                            </h2>
                            <p class="ll-services__description">
                                <?php esc_html_e('Vive la experiencia de volar hoy junto a nuestro equipo experto y confiable.', 'low-landing'); ?>
                            </p>
                            <p class="ll-services__description">
                                <?php esc_html_e('En Centro de Vuelo Las Vizcachas, realizamos vuelos biplaza con los más altos estándares, ofrecemos atención personalizada y fomentamos un turismo responsable. Garantizamos emoción, confianza y profesionalismo en cada vuelo.', 'low-landing'); ?>
                            </p>

                            <!-- Características con iconos -->
                            <div class="ll-services__features">
                                <div class="ll-feature">
                                    <div class="ll-feature__icon">
                                        <img src="<?php echo esc_url(plugins_url('assets/images/Shield.png', __FILE__)); ?>"
                                            alt="<?php esc_attr_e('Profesional certificado', 'low-landing'); ?>">
                                    </div>
                                    <div class="ll-feature__text">
                                        <h3 class="ll-feature__title"><?php esc_html_e('Profesional certificado', 'low-landing'); ?>
                                        </h3>
                                        <p class="ll-feature__subtitle">
                                            <?php esc_html_e('Instructores certificados con años de experiencia .', 'low-landing'); ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="ll-feature">
                                    <div class="ll-feature__icon">
                                        <img src="<?php echo esc_url(plugins_url('assets/images/Star.png', __FILE__)); ?>"
                                            alt="<?php esc_attr_e('No se necesita experiencia', 'low-landing'); ?>">
                                    </div>
                                    <div class="ll-feature__text">
                                        <h3 class="ll-feature__title">
                                            <?php esc_html_e('No se necesita experiencia', 'low-landing'); ?>
                                        </h3>
                                        <p class="ll-feature__subtitle">
                                            <?php esc_html_e('Perfecto para cualquier persona.', 'low-landing'); ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="ll-feature">
                                    <div class="ll-feature__icon">
                                        <img src="<?php echo esc_url(plugins_url('assets/images/Users.png', __FILE__)); ?>"
                                            alt="<?php esc_attr_e('Atención personalizada', 'low-landing'); ?>">
                                    </div>
                                    <div class="ll-feature__text">
                                        <h3 class="ll-feature__title"><?php esc_html_e('Atención personalizada', 'low-landing'); ?>
                                        </h3>
                                        <p class="ll-feature__subtitle">
                                            <?php esc_html_e('Orientación personalizada durante toda su experiencia de vuelo.', 'low-landing'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón CTA -->
                            <a class="ll-services__cta" href="<?php echo esc_url('#'); ?>">
                                <?php esc_html_e('Ver más', 'low-landing'); ?>
                            </a>
                        </div>

                        <!-- Columna derecha: Imágenes -->
                        <div class="ll-services__images">
                            <img class="ll-services__image"
                                src="<?php echo esc_url(plugins_url('assets/images/foto1_servicios.png', __FILE__)); ?>"
                                alt="<?php esc_attr_e('Experiencia de vuelo en parapente', 'low-landing'); ?>">
                            <img class="ll-services__image"
                                src="<?php echo esc_url(plugins_url('assets/images/foto2_servicios.png', __FILE__)); ?>"
                                alt="<?php esc_attr_e('Vuelo biplaza profesional', 'low-landing'); ?>">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sección de ubicación/mapa -->
            <section class="ll-section ll-section--location">
                <div class="ll-section__inner">
                    <div class="ll-location">
                        <!-- Título y detalles -->
                        <div class="ll-location__header">
                            <h2 class="ll-location__title">
                                <?php esc_html_e('¿Cómo llegar al Centro de Vuelo Las Vizcachas?', 'low-landing'); ?>
                            </h2>

                            <div class="ll-location__details">
                                <div class="ll-location__detail">
                                    <img class="ll-location__icon"
                                        src="<?php echo esc_url(plugins_url('assets/images/Map.png', __FILE__)); ?>"
                                        alt="<?php esc_attr_e('Ubicación', 'low-landing'); ?>">
                                    <span class="ll-location__text">
                                        <?php esc_html_e('Dirección: San José de Maipo 07820, Puente Alto', 'low-landing'); ?>
                                    </span>
                                </div>

                                <div class="ll-location__detail">
                                    <span class="ll-location__text">
                                        <?php esc_html_e('Teléfonos: (+56 9) 6216 9374', 'low-landing'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Mapa -->
                        <div class="ll-location__map">
                            <iframe title="<?php echo esc_attr__('Mapa Centro de Vuelo Las Vizcachas', 'low-landing'); ?>"
                                src="https://www.google.com/maps?q=-33.59733193001917,-70.50430920072101&amp;z=16&amp;hl=es&amp;output=embed"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sección de experiencias/lugares -->
            <section class="ll-section ll-section--experiences">
                <div class="ll-section__inner">
                    <div class="ll-experiences">
                        <!-- Header -->
                        <div class="ll-experiences__header">
                            <span
                                class="ll-experiences__label"><?php esc_html_e('SIGUE CON NUEVAS AVENTURAS', 'low-landing'); ?></span>
                            <h2 class="ll-experiences__title">
                                <?php esc_html_e('OTROS LUGARES: EXPLORA, DISFRUTA Y DESCUBRE UNA NUEVA EXPERIENCIA.', 'low-landing'); ?>
                            </h2>
                            <p class="ll-experiences__description">
                                <?php esc_html_e('Encuentra experiencias únicas, rutas de senderismo, hospedajes encantadores y sabores locales. Todo el turismo que buscas.', 'low-landing'); ?>
                            </p>
                        </div>

                        <!-- Grid de cards -->
                        <div class="ll-experiences__grid">
                            <!-- Card 1: Hospedaje -->
                            <div class="ll-experience-card">
                                <div class="ll-experience-card__image">
                                    <img src="<?php echo esc_url(plugins_url('assets/images/Hospedaje.png', __FILE__)); ?>"
                                        alt="<?php esc_attr_e('Hospedaje', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url(plugins_url('assets/images/Home.png', __FILE__)); ?>"
                                                alt="">
                                        </div>
                                        <h3 class="ll-experience-card__title"><?php esc_html_e('Hospedaje', 'low-landing'); ?></h3>
                                    </div>
                                </div>
                                <div class="ll-experience-card__content">
                                    <p class="ll-experience-card__text">
                                        <?php esc_html_e('Descubre hospedajes únicos en cada destino. Vive la experiencia local y siéntete como en casa, dondequiera que viajes.', 'low-landing'); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Card 2: Restaurantes -->
                            <div class="ll-experience-card">
                                <div class="ll-experience-card__image">
                                    <img src="<?php echo esc_url(plugins_url('assets/images/Restaurantes.png', __FILE__)); ?>"
                                        alt="<?php esc_attr_e('Restaurantes', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url(plugins_url('assets/images/Food.png', __FILE__)); ?>"
                                                alt="">
                                        </div>
                                        <h3 class="ll-experience-card__title"><?php esc_html_e('Restaurantes', 'low-landing'); ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="ll-experience-card__content">
                                    <p class="ll-experience-card__text">
                                        <?php esc_html_e('Explora el mundo a través de sus sabores. De la cocina tradicional a la gourmet, cada plato es una nueva aventura.', 'low-landing'); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Card 3: Atractivos turísticos -->
                            <div class="ll-experience-card">
                                <div class="ll-experience-card__image">
                                    <img src="<?php echo esc_url(plugins_url('assets/images/Atractivos.png', __FILE__)); ?>"
                                        alt="<?php esc_attr_e('Atractivos turísticos', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url(plugins_url('assets/images/Camera.png', __FILE__)); ?>"
                                                alt="">
                                        </div>
                                        <h3 class="ll-experience-card__title">
                                            <?php esc_html_e('Atractivos turísticos', 'low-landing'); ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="ll-experience-card__content">
                                    <p class="ll-experience-card__text">
                                        <?php esc_html_e('Descubre la magia de cada destino. Explora paisajes, culturas y tradiciones que te dejarán sin aliento.', 'low-landing'); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Card 4: Actividades -->
                            <div class="ll-experience-card">
                                <div class="ll-experience-card__image">
                                    <img src="<?php echo esc_url(plugins_url('assets/images/Actividades.png', __FILE__)); ?>"
                                        alt="<?php esc_attr_e('Actividades', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url(plugins_url('assets/images/Heart.png', __FILE__)); ?>"
                                                alt="">
                                        </div>
                                        <h3 class="ll-experience-card__title"><?php esc_html_e('Actividades', 'low-landing'); ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="ll-experience-card__content">
                                    <p class="ll-experience-card__text">
                                        <?php esc_html_e('Vive la emoción de cada destino. Desde deportes extremos hasta actividades culturales, ¡hay una aventura para todos!', 'low-landing'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer con texto y botón -->
                        <div class="ll-experiences__footer">
                            <p class="ll-experiences__footer-text">
                                <?php esc_html_e('Y MUCHO MÁS AQUÍ EN CAJON DEL MAIPO', 'low-landing'); ?>
                            </p>
                            <a class="ll-experiences__cta" href="https://cajondelmaipochile.cl/" target="_blank"
                                rel="noopener noreferrer">
                                <?php esc_html_e('Ir al link', 'low-landing'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <?php

            return (string) ob_get_clean();
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

        public function render_footer_shortcode(array $atts = []): string
        {
            $defaults = [];
            $atts = shortcode_atts($defaults, $atts, 'footer');

            wp_enqueue_style(self::HANDLE);

            ob_start();
            ?>
            <footer class="ll-footer">
                <div class="ll-footer__main">
                    <div class="ll-footer__inner">
                        <!-- Columna 1: Logo y Descripción -->
                        <div class="ll-footer__col ll-footer__col--brand">
                            <h3 class="ll-footer__logo"><?php esc_html_e('LOGO PARAPENTE', 'low-landing'); ?></h3>
                            <p class="ll-footer__description">
                                <?php esc_html_e('Tu destino ideal para practicar parapente. Vive la emoción de volar en espectaculares paisajes de montaña', 'low-landing'); ?>
                            </p>
                        </div>

                        <!-- Columna 2: Accesos directos -->
                        <div class="ll-footer__col ll-footer__col--nav">
                            <h4 class="ll-footer__col-title"><?php esc_html_e('Accesos directos', 'low-landing'); ?></h4>
                            <ul class="ll-footer__menu">
                                <li><a href="#"><?php esc_html_e('HOME', 'low-landing'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('¿QUIÉNES SOMOS?', 'low-landing'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('CONTACTO', 'low-landing'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('PROTOCOLOS', 'low-landing'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('VUELOS', 'low-landing'); ?></a></li>
                            </ul>
                        </div>

                        <!-- Columna 3: Ubicación -->
                        <div class="ll-footer__col ll-footer__col--location">
                            <h4 class="ll-footer__col-title"><?php esc_html_e('¿Dónde encontrarnos?', 'low-landing'); ?></h4>
                            <div class="ll-footer__location-item">
                                <span class="ll-footer__icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"
                                            fill="#FFFFFF" />
                                    </svg>
                                </span>
                                <span class="ll-footer__address-text">Camino San José de Maipo 7820, Puente alto</span>
                            </div>
                        </div>

                        <!-- Columna 4: Contacto -->
                        <div class="ll-footer__col ll-footer__col--contact">
                            <h4 class="ll-footer__col-title"><?php esc_html_e('Contacto', 'low-landing'); ?></h4>
                            <ul class="ll-footer__contact-list">
                                <li>
                                    <span class="ll-footer__icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"
                                                fill="#FFFFFF" />
                                        </svg>
                                    </span>
                                    <span>(+56 9) 6216 9374</span>
                                </li>
                                <li>
                                    <span class="ll-footer__icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"
                                                fill="#FFFFFF" />
                                        </svg>
                                    </span>
                                    <span>(+56 9) 8906 4098</span>
                                </li>
                                <li>
                                    <span class="ll-footer__icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"
                                                fill="#FFFFFF" />
                                        </svg>
                                    </span>
                                    <span>Centro de vuelos las vizcachas</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ll-footer__bottom">
                    <a href="https://centrovuelosvizcachas.cl/" target="_blank"
                        rel="noopener noreferrer">https://centrovuelosvizcachas.cl/</a>
                </div>
            </footer>
            <?php

            return (string) ob_get_clean();
        }
    }

    LowLanding::bootstrap();
}

