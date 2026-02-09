
            <div class="ll-topbar">
                <span class="ll-topbar__text"><?php esc_html_e('horario de atención: miércoles a domingo', 'low-landing'); ?></span>
                <div class="ll-topbar__actions">
                    <a class="ll-topbar__link ll-topbar__link--ig" href="#" aria-label="<?php esc_attr_e('Instagram', 'low-landing'); ?>">
                        <img src="<?php echo esc_url($asset_base . 'images/Instagram.png'); ?>" alt="<?php esc_attr_e('Icono Instagram', 'low-landing'); ?>">
                    </a>
                    <a class="ll-topbar__link ll-topbar__link--wa" href="https://api.whatsapp.com/send/?phone=56962169374&amp;text=Hola%2C+te+escribo+desde+centrovuelosvizcachas.cl%0D%0ANecesito+información&amp;type=phone_number&amp;app_absent=0" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('WhatsApp', 'low-landing'); ?>">
                        <img src="<?php echo esc_url($asset_base . 'images/Whatsapp.png'); ?>" alt="<?php esc_attr_e('Icono WhatsApp', 'low-landing'); ?>">
                    </a>
                </div>
            </div>

            <!-- Seccion Hero Aventura -->
            <section class="ll-section ll-section--adventure">
                <div class="ll-adventure">
                    <div class="ll-adventure__overlay"></div>

                    <header class="ll-adventure__nav">
                        <div class="ll-adventure__logo"><?php esc_html_e('LOGO PARAPENTE', 'low-landing'); ?></div>
                        <nav class="ll-adventure__menu">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('HOME', 'low-landing'); ?></a>
                            <a href="<?php echo esc_url(home_url('/quienes-somos/')); ?>"><?php esc_html_e('¿QUIÉNES SOMOS?', 'low-landing'); ?></a>
                            <a href="<?php echo esc_url(home_url('/contacto/')); ?>"><?php esc_html_e('CONTACTO', 'low-landing'); ?></a>
                            <a href="<?php echo esc_url(home_url('/protocolos/')); ?>"><?php esc_html_e('PROTOCOLOS', 'low-landing'); ?></a>
                            <a href="<?php echo esc_url(home_url('/servicios/')); ?>"><?php esc_html_e('SERVICIOS', 'low-landing'); ?></a>
                            <a href="<?php echo esc_url(home_url('/vuelos/')); ?>"><?php esc_html_e('VUELOS', 'low-landing'); ?></a>
                        </nav>
                        <div class="ll-adventure__lang">
                            <img src="<?php echo esc_url($asset_base . 'images/espaniol.png'); ?>" alt="<?php esc_attr_e('Bandera español', 'low-landing'); ?>">
                            <span>ES</span>
                            <span class="ll-adventure__lang-icon">▼</span>
                        </div>
                    </header>

                    <div class="ll-adventure__corners">
                        <img src="<?php echo esc_url($asset_base . 'images/Vector 4.png'); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--tl">
                        <img src="<?php echo esc_url($asset_base . 'images/Vector 3.png'); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--tr">
                        <img src="<?php echo esc_url($asset_base . 'images/Vector 1.png'); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--bl">
                        <img src="<?php echo esc_url($asset_base . 'images/Vector 2.png'); ?>" alt="" class="ll-adventure__corner ll-adventure__corner--br">
                    </div>

                    <div class="ll-adventure__content">
                        <div class="ll-adventure__title">
                            <span class="ll-adventure__bullet">&#9656;</span>
                            <div>
                                <div class="ll-adventure__headline">
                                    <?php
                                    printf(
                                        /* translators: %s italic word */
                                        esc_html__('TU %s', 'low-landing'),
                                        '<span class="ll-adventure__headline--accent">' . esc_html__('AVENTURA', 'low-landing') . '</span>'
                                    );
                                    ?>
                                </div>
                                <div class="ll-adventure__headline">
                                    <?php esc_html_e('EMPIEZA EN LAS', 'low-landing'); ?>
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
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tl" src="<?php echo esc_url($asset_base . 'images/esquina2.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tr" src="<?php echo esc_url($asset_base . 'images/esquina1.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--bl" src="<?php echo esc_url($asset_base . 'images/esquina4.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--br" src="<?php echo esc_url($asset_base . 'images/esquina3.png'); ?>" alt="">
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
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tl" src="<?php echo esc_url($asset_base . 'images/esquina2.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tr" src="<?php echo esc_url($asset_base . 'images/esquina1.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--bl" src="<?php echo esc_url($asset_base . 'images/esquina4.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--br" src="<?php echo esc_url($asset_base . 'images/esquina3.png'); ?>" alt="">
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
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tl" src="<?php echo esc_url($asset_base . 'images/esquina2.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--tr" src="<?php echo esc_url($asset_base . 'images/esquina1.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--bl" src="<?php echo esc_url($asset_base . 'images/esquina4.png'); ?>" alt="">
                                            <img class="ll-welcome-card__badge-corner ll-welcome-card__badge-corner--br" src="<?php echo esc_url($asset_base . 'images/esquina3.png'); ?>" alt="">
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
                            <img src="<?php echo esc_url($asset_base . 'images/temporadas.png'); ?>"
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
                            <?php esc_html_e('AQU&Iacute; PUEDES VER UN PAR DE VUELOS HECHOS EN EL CENTRO DE VUELO', 'low-landing'); ?>
                        </h2>
                        <div class="ll-tracks__map">
                            <img src="<?php echo esc_url($asset_base . 'images/tracks.png'); ?>"
                                alt="<?php esc_attr_e('Mapa de tracks de vuelos', 'low-landing'); ?>">
                        </div>
                        <p class="ll-tracks__description">
                            <?php esc_html_e('&iquest;QUIERES SEGUIR VIENDO EXPERIENCIAS DE VUELOS?', 'low-landing'); ?>
                        </p>
                        <a class="ll-tracks__cta" href="<?php echo esc_url('#'); ?>">
                            <?php esc_html_e('Ver m&aacute;s', 'low-landing'); ?>
                        </a>
                    </div>
                </div>
            </section>

            <div class="ll-hero-wrap">
                <section class="ll-hero" style="<?php echo $style; ?>">
                    <div class="ll-hero__content">
                        <span class="ll-hero__pretitle"><?php esc_html_e('Comienza ahora', 'low-landing'); ?></span>
                        <h2 class="ll-hero__title"><?php esc_html_e('&iquest;Listo para volar?', 'low-landing'); ?></h2>
                        <p class="ll-hero__description">
                            <?php esc_html_e('Ya sea un piloto experimentado que busca su pr&oacute;xima aventura o que est&aacute; explorando nuestros servicios, estamos aqu&iacute; para hacer que su experiencia de parapente sea excepcional.', 'low-landing'); ?>
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
                                        <img src="<?php echo esc_url($asset_base . 'images/Shield.png'); ?>"
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
                                        <img src="<?php echo esc_url($asset_base . 'images/Star.png'); ?>"
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
                                        <img src="<?php echo esc_url($asset_base . 'images/Users.png'); ?>"
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
                                src="<?php echo esc_url($asset_base . 'images/foto1_servicios.png'); ?>"
                                alt="<?php esc_attr_e('Experiencia de vuelo en parapente', 'low-landing'); ?>">
                            <img class="ll-services__image"
                                src="<?php echo esc_url($asset_base . 'images/foto2_servicios.png'); ?>"
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
                                        src="<?php echo esc_url($asset_base . 'images/Map.png'); ?>"
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
                                    <img src="<?php echo esc_url($asset_base . 'images/Hospedaje.png'); ?>"
                                        alt="<?php esc_attr_e('Hospedaje', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url($asset_base . 'images/Home.png'); ?>"
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
                                    <img src="<?php echo esc_url($asset_base . 'images/Restaurantes.png'); ?>"
                                        alt="<?php esc_attr_e('Restaurantes', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url($asset_base . 'images/Food.png'); ?>"
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
                                    <img src="<?php echo esc_url($asset_base . 'images/Atractivos.png'); ?>"
                                        alt="<?php esc_attr_e('Atractivos turísticos', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url($asset_base . 'images/Camera.png'); ?>"
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
                                    <img src="<?php echo esc_url($asset_base . 'images/Actividades.png'); ?>"
                                        alt="<?php esc_attr_e('Actividades', 'low-landing'); ?>">
                                    <div class="ll-experience-card__header">
                                        <div class="ll-experience-card__icon">
                                            <img src="<?php echo esc_url($asset_base . 'images/Heart.png'); ?>"
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

            
