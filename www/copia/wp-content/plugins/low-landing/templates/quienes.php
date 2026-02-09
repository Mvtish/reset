
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

            <section class="ll-section ll-section--quienes">
                <div class="ll-quienes">
                    <div class="ll-quienes__overlay"></div>

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

                    <div class="ll-quienes__content">
                        <div class="ll-quienes__title">
                            <span class="ll-quienes__bullet">&#9656;</span>
                            <div>
                                <div class="ll-quienes__headline">
                                    <?php
                                    printf(
                                        esc_html__('CENTRO DE %s', 'low-landing'),
                                        '<span class="ll-quienes__headline--accent">' . esc_html__('VUELO', 'low-landing') . '</span>'
                                    );
                                    ?>
                                </div>
                                <div class="ll-quienes__headline">
                                    <?php esc_html_e('LAS VIZCACHAS', 'low-landing'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ll-section ll-section--union">
                <div class="ll-section__inner ll-union">
                    <div class="ll-union__image">
                        <img src="<?php echo esc_url($asset_base . 'images/union.png'); ?>" alt="<?php esc_attr_e('Equipo de parapente al atardecer', 'low-landing'); ?>">
                        <div class="ll-union__badge">
                            <span class="ll-union__badge-number">25+</span>
                            <span class="ll-union__badge-text"><?php esc_html_e('AÑOS DE EXPERIENCIA', 'low-landing'); ?></span>
                        </div>
                    </div>

                    <div class="ll-union__content">
                        <span class="ll-union__eyebrow">
                            <span class="ll-union__eyebrow-line"></span>
                            <?php esc_html_e('SOBRE NOSOTROS', 'low-landing'); ?>
                        </span>
                        <h2 class="ll-union__title"><?php esc_html_e('Experiencia, confianza y calidad en el aire', 'low-landing'); ?></h2>
                        <p class="ll-union__text">
                            <?php esc_html_e('Con más de 25 años de experiencia en vuelos comerciales, somos un equipo apasionado por el aire y la libertad de volar. Nos dedicamos a ofrecer experiencias de parapente únicas, y memorables, elevando los estándares del turismo aéreo en Chile.', 'low-landing'); ?>
                        </p>
                        <p class="ll-union__text">
                            <?php esc_html_e('Cumplimos con todas las normativas de SERNATUR y la Dirección General de Aeronáutica Civil.', 'low-landing'); ?>
                        </p>
                        <a class="ll-union__cta" href="#"><?php esc_html_e('Ver más', 'low-landing'); ?></a>
                    </div>
                </div>
            </section>

            <section class="ll-section ll-section--vive">
                <div class="ll-vive">
                    <div class="ll-vive__overlay"></div>
                    <div class="ll-vive__content">
                        <h2 class="ll-vive__title"><?php esc_html_e('VIVE CON NOSOTROS LA EMOCIÓN DE VOLAR Y DESCUBRE UNA NUEVA FORMA DE DISFRUTAR EL PAISAJE DESDE LAS ALTURAS.', 'low-landing'); ?></h2>
                        <p class="ll-vive__subtitle"><?php esc_html_e('Aprobados por SERNATUR', 'low-landing'); ?></p>
                    </div>
                </div>
            </section>

            <section class="ll-section ll-section--asegura">
                <div class="ll-asegura">
                    <div class="ll-asegura__header">
                        <h2 class="ll-asegura__title"><?php esc_html_e('POR QUE NOS ASEGURAMOS QUE TU EXPERIENCIA SEA REALMENTE BUENA', 'low-landing'); ?></h2>
                    </div>

                    <div class="ll-asegura__cards">
                        <article class="ll-asegura-card">
                            <div class="ll-asegura-card__image ll-asegura-card__image--one">
                                <div class="ll-asegura-card__overlay">
                                    <div class="ll-asegura-card__badge-wrap">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--tl" src="<?php echo esc_url($asset_base . 'images/esquina2.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--tr" src="<?php echo esc_url($asset_base . 'images/esquina1.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--bl" src="<?php echo esc_url($asset_base . 'images/esquina4.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--br" src="<?php echo esc_url($asset_base . 'images/esquina3.png'); ?>" alt="">
                                        <span class="ll-asegura-card__badge">
                                            <img src="<?php echo esc_url($asset_base . 'images/licencia.png'); ?>" alt="<?php esc_attr_e('Icono licencia', 'low-landing'); ?>">
                                        </span>
                                    </div>
                                    <div class="ll-asegura-card__title"><?php esc_html_e('LICENCIAS AL DÍA', 'low-landing'); ?></div>
                                </div>
                            </div>
                            <div class="ll-asegura-card__body">
                                <span class="ll-asegura-card__bullet">&#9656;</span>
                                <p class="ll-asegura-card__text"><?php esc_html_e('Cada piloto con el que vives tu experiencia tiene licencia al día.', 'low-landing'); ?></p>
                            </div>
                        </article>

                        <article class="ll-asegura-card">
                            <div class="ll-asegura-card__image ll-asegura-card__image--two">
                                <div class="ll-asegura-card__overlay">
                                    <div class="ll-asegura-card__badge-wrap">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--tl" src="<?php echo esc_url($asset_base . 'images/esquina2.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--tr" src="<?php echo esc_url($asset_base . 'images/esquina1.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--bl" src="<?php echo esc_url($asset_base . 'images/esquina4.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--br" src="<?php echo esc_url($asset_base . 'images/esquina3.png'); ?>" alt="">
                                        <span class="ll-asegura-card__badge">
                                            <img src="<?php echo esc_url($asset_base . 'images/auxilio.png'); ?>" alt="<?php esc_attr_e('Icono primeros auxilios', 'low-landing'); ?>">
                                        </span>
                                    </div>
                                    <div class="ll-asegura-card__title"><?php esc_html_e('PRIMEROS AUXILIOS', 'low-landing'); ?></div>
                                </div>
                            </div>
                            <div class="ll-asegura-card__body">
                                <span class="ll-asegura-card__bullet">&#9656;</span>
                                <p class="ll-asegura-card__text"><?php esc_html_e('Cada piloto cuenta con un curso de Primeros Auxilios actualizado.', 'low-landing'); ?></p>
                            </div>
                        </article>

                        <article class="ll-asegura-card">
                            <div class="ll-asegura-card__image ll-asegura-card__image--three">
                                <div class="ll-asegura-card__overlay">
                                    <div class="ll-asegura-card__badge-wrap">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--tl" src="<?php echo esc_url($asset_base . 'images/esquina2.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--tr" src="<?php echo esc_url($asset_base . 'images/esquina1.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--bl" src="<?php echo esc_url($asset_base . 'images/esquina4.png'); ?>" alt="">
                                        <img class="ll-asegura-card__badge-corner ll-asegura-card__badge-corner--br" src="<?php echo esc_url($asset_base . 'images/esquina3.png'); ?>" alt="">
                                        <span class="ll-asegura-card__badge">
                                            <img src="<?php echo esc_url($asset_base . 'images/sonrisa.png'); ?>" alt="<?php esc_attr_e('Icono claros y oportunos', 'low-landing'); ?>">
                                        </span>
                                    </div>
                                    <div class="ll-asegura-card__title"><?php esc_html_e('CLAROS Y OPORTUNOS', 'low-landing'); ?></div>
                                </div>
                            </div>
                            <div class="ll-asegura-card__body">
                                <span class="ll-asegura-card__bullet">&#9656;</span>
                                <p class="ll-asegura-card__text"><?php esc_html_e('Nos preocupamos de dar toda la información sobre la experiencia de forma clara y oportuna al pasajero.', 'low-landing'); ?></p>
                            </div>
                        </article>
                    </div>

                    <div class="ll-asegura__footer">
                        <a class="ll-asegura__link" href="#"><?php esc_html_e('Puedes revisar nuestros protocolos aquí', 'low-landing'); ?></a>
                        <a class="ll-asegura__cta" href="#"><?php esc_html_e('Ver más', 'low-landing'); ?></a>
                    </div>
                </div>
            </section>

            <section class="ll-section ll-section--collab">
                <div class="ll-collab">
                    <div class="ll-collab__header">
                        <span class="ll-collab__arrow"></span>
                        <h2 class="ll-collab__title"><?php esc_html_e('Colaboradores', 'low-landing'); ?></h2>
                    </div>
                    <div class="ll-collab__marquee" aria-label="<?php esc_attr_e('Logos de colaboradores desplazándose automáticamente', 'low-landing'); ?>">
                        <div class="ll-collab__track">
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca1.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 1', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca2.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 2', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca3.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 3', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca4.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 4', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca5.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 5', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca6.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 6', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca7.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 7', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca8.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 8', 'low-landing'); ?>">
                            </div>
                            <!-- duplicado para loop infinito -->
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca1.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 1', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca2.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 2', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca3.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 3', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca4.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 4', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca5.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 5', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca6.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 6', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca7.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 7', 'low-landing'); ?>">
                            </div>
                            <div class="ll-collab__item">
                                <img src="<?php echo esc_url($asset_base . 'images/marca8.png'); ?>" alt="<?php esc_attr_e('Logo colaborador 8', 'low-landing'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            echo $this->render_footer_shortcode();

            
