
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

            <section class="ll-section ll-section--adventure ll-section--services-hero">
                <div class="ll-adventure ll-adventure--services">
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
                                    <?php esc_html_e('VUELOS', 'low-landing'); ?> 
                                    <span class="ll-adventure__headline--accent"><?php esc_html_e('BIPLAZA', 'low-landing'); ?></span><?php esc_html_e(': TU AVENTURA COMIENZA EN EL AIRE', 'low-landing'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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

            <!-- Sección Dos Formas de Vivir el Cielo -->
            <section class="ll-section ll-section--two-ways">
                <div class="ll-two-ways">
                    <div class="ll-two-ways__overlay"></div>
                    <div class="ll-two-ways__content">
                        <h2 class="ll-two-ways__title">
                            <?php esc_html_e('DOS FORMAS DE VIVIR EL CIELO', 'low-landing'); ?>
                        </h2>
                        <p class="ll-two-ways__subtitle">
                            <?php esc_html_e('Ya sea tu primer vuelo o una nueva travesía, tenemos la experiencia perfecta para ti.', 'low-landing'); ?>
                        </p>
                        <p class="ll-two-ways__description">
                            <?php esc_html_e('Ven a volar junto a un piloto certificado en un emocionante vuelo biplaza, o accede como parapentista independiente para disfrutar de este increíble punto de despegue.', 'low-landing'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <!-- Sección opciones de vuelo -->
            <section class="ll-section ll-section--flight-options">
                <div class="ll-flight-options">
                    <div class="ll-flight-option">
                        <div class="ll-flight-option__image">
                            <img src="<?php echo esc_url($asset_base . 'images/parapentista_certificado.png'); ?>" 
                                 alt="<?php esc_attr_e('Acceso para parapentistas certificados', 'low-landing'); ?>">
                        </div>
                        <div class="ll-flight-option__content">
                            <h3 class="ll-flight-option__title">
                                <span class="ll-flight-option__bullet">&#9656;</span>
                                <?php esc_html_e('ACCESO PARA PARAPENTISTAS CERTIFICADOS', 'low-landing'); ?>
                            </h3>
                            <p class="ll-flight-option__text">
                                <?php esc_html_e('Disfruta del despegue y recorrido por tu cuenta en este punto de vuelo autorizado, ideal para parapentistas con licencia que quieren volar libremente.', 'low-landing'); ?>
                            </p>
                            <ul class="ll-flight-option__list">
                                <li><?php esc_html_e('Acceso al sitio de vuelo', 'low-landing'); ?></li>
                                <li><?php esc_html_e('Para pilotos certificados', 'low-landing'); ?></li>
                                <li><?php esc_html_e('Vuelo independiente', 'low-landing'); ?></li>
                            </ul>
                            <div class="ll-flight-option__price">
                                <?php esc_html_e('Valor: $10.000', 'low-landing'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="ll-flight-option ll-flight-option--reverse">
                        <div class="ll-flight-option__image">
                            <img src="<?php echo esc_url($asset_base . 'images/piloto_certificado.png'); ?>" 
                                 alt="<?php esc_attr_e('Vuela con un piloto certificado', 'low-landing'); ?>">
                        </div>
                        <div class="ll-flight-option__content">
                            <h3 class="ll-flight-option__title">
                                <span class="ll-flight-option__bullet">&#9656;</span>
                                <?php esc_html_e('VUELA CON UN PILOTO CERTIFICADO', 'low-landing'); ?>
                            </h3>
                            <p class="ll-flight-option__text">
                                <?php esc_html_e('Experimenta la emoción de volar sin preocuparte por nada: un piloto experto te acompañará en cada despegue y aterrizaje.', 'low-landing'); ?>
                            </p>
                            <ul class="ll-flight-option__list">
                                <li><?php esc_html_e('Grabación en GoPro incluida', 'low-landing'); ?></li>
                                <li><?php esc_html_e('Experiencia segura y guiada', 'low-landing'); ?></li>
                            </ul>
                            <div class="ll-flight-option__price">
                                <?php esc_html_e('Valor: $65.000', 'low-landing'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sección galería de experiencias -->
            <section class="ll-section ll-section--experiences">
                <div class="ll-experiences">
                    <div class="ll-experiences__header">
                        <div class="ll-experiences__title-wrapper">
                            <span class="ll-experiences__bullet">&#9656;</span>
                            <div class="ll-experiences__text">
                                <h2 class="ll-experiences__title">
                                    <?php esc_html_e('REVISA NUESTRAS EXPERIENCIAS EN EL CENTRO DE VUELO', 'low-landing'); ?>
                                </h2>
                                <p class="ll-experiences__subtitle">
                                    <?php esc_html_e('Encuentra experiencias únicas con centro de vuelo las vizcachas', 'low-landing'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ll-experiences__gallery">
                        <div class="ll-experiences__item ll-experiences__item--large">
                            <img src="<?php echo esc_url($asset_base . 'images/galeria1.png'); ?>" 
                                 alt="<?php esc_attr_e('Experiencia de vuelo', 'low-landing'); ?>">
                        </div>
                        <div class="ll-experiences__item">
                            <img src="<?php echo esc_url($asset_base . 'images/galeria2.png'); ?>" 
                                 alt="<?php esc_attr_e('Experiencia de vuelo', 'low-landing'); ?>">
                        </div>
                        <div class="ll-experiences__item">
                            <img src="<?php echo esc_url($asset_base . 'images/galeria3.png'); ?>" 
                                 alt="<?php esc_attr_e('Experiencia de vuelo', 'low-landing'); ?>">
                        </div>
                        <div class="ll-experiences__item">
                            <img src="<?php echo esc_url($asset_base . 'images/galeria4.png'); ?>" 
                                 alt="<?php esc_attr_e('Experiencia de vuelo', 'low-landing'); ?>">
                        </div>
                    </div>
                </div>
            </section>

            <?php
            echo $this->render_footer_shortcode();

            
