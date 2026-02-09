
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

            <section class="ll-section ll-section--adventure">
                <div class="ll-adventure ll-adventure--protocols">
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
                                    <?php esc_html_e('INFORMACIÓN', 'low-landing'); ?> 
                                    <span class="ll-adventure__headline--accent"><?php esc_html_e('IMPORTANTE', 'low-landing'); ?></span><?php esc_html_e(': PROTOCOLOS PARA LA EXPERIENCIA', 'low-landing'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ll-section ll-section--protocols-list">
                <div class="ll-protocols">
                    <div class="ll-protocols__header">
                        <span class="ll-protocols__bullet">&#9656;</span>
                        <h2 class="ll-protocols__title"><?php esc_html_e('REVISA NUESTROS PROTOCOLOS', 'low-landing'); ?></h2>
                    </div>
                    <div class="ll-protocols__columns">
                        <div class="ll-protocols__column">
                            <p class="ll-protocols__label"><?php esc_html_e('Protocolos en Español', 'low-landing'); ?></p>
                            <div class="ll-protocols__cards">
                                <a class="ll-protocols-card" href="#" download>
                                    <span class="ll-protocols-card__text"><?php esc_html_e('Ficha tecnica de la actividas', 'low-landing'); ?></span>
                                    <span class="ll-protocols-card__actions" aria-hidden="true">
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--view">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 5c-5 0-9.27 3.11-11 7 1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Zm0-8a3 3 0 1 0 .002 6.002A3 3 0 0 0 12 9Z"/></svg>
                                        </span>
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--download">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 3a1 1 0 0 1 1 1v9.17l3.59-3.58A1 1 0 1 1 17 11l-5 5-5-5a1 1 0 0 1 1.41-1.41L11 13.17V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1 1v2h12v-2a1 1 0 1 1 2 0v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1Z"/></svg>
                                        </span>
                                    </span>
                                </a>
                                <a class="ll-protocols-card" href="#" download>
                                    <span class="ll-protocols-card__text"><?php esc_html_e('Plan de prevención y manejo de riesgos', 'low-landing'); ?></span>
                                    <span class="ll-protocols-card__actions" aria-hidden="true">
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--view">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 5c-5 0-9.27 3.11-11 7 1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Zm0-8a3 3 0 1 0 .002 6.002A3 3 0 0 0 12 9Z"/></svg>
                                        </span>
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--download">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 3a1 1 0 0 1 1 1v9.17l3.59-3.58A1 1 0 1 1 17 11l-5 5-5-5a1 1 0 0 1 1.41-1.41L11 13.17V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1 1v2h12v-2a1 1 0 1 1 2 0v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1Z"/></svg>
                                        </span>
                                    </span>
                                </a>
                                <a class="ll-protocols-card" href="#" download>
                                    <span class="ll-protocols-card__text"><?php esc_html_e('Plan de respuesta frente a situaciones de emergencia', 'low-landing'); ?></span>
                                    <span class="ll-protocols-card__actions" aria-hidden="true">
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--view">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 5c-5 0-9.27 3.11-11 7 1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Zm0-8a3 3 0 1 0 .002 6.002A3 3 0 0 0 12 9Z"/></svg>
                                        </span>
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--download">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 3a1 1 0 0 1 1 1v9.17l3.59-3.58A1 1 0 1 1 17 11l-5 5-5-5a1 1 0 0 1 1.41-1.41L11 13.17V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1 1v2h12v-2a1 1 0 1 1 2 0v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1Z"/></svg>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="ll-protocols__column">
                            <p class="ll-protocols__label"><?php esc_html_e('Protocolos en Ingles', 'low-landing'); ?></p>
                            <div class="ll-protocols__cards">
                                <a class="ll-protocols-card" href="#" download>
                                    <span class="ll-protocols-card__text"><?php esc_html_e('Technical data sheet exercise', 'low-landing'); ?></span>
                                    <span class="ll-protocols-card__actions" aria-hidden="true">
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--view">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 5c-5 0-9.27 3.11-11 7 1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Zm0-8a3 3 0 1 0 .002 6.002A3 3 0 0 0 12 9Z"/></svg>
                                        </span>
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--download">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 3a1 1 0 0 1 1 1v9.17l3.59-3.58A1 1 0 1 1 17 11l-5 5-5-5a1 1 0 0 1 1.41-1.41L11 13.17V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1 1v2h12v-2a1 1 0 1 1 2 0v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1Z"/></svg>
                                        </span>
                                    </span>
                                </a>
                                <a class="ll-protocols-card" href="#" download>
                                    <span class="ll-protocols-card__text"><?php esc_html_e('Plan of management of prevention of risk', 'low-landing'); ?></span>
                                    <span class="ll-protocols-card__actions" aria-hidden="true">
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--view">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 5c-5 0-9.27 3.11-11 7 1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Zm0-8a3 3 0 1 0 .002 6.002A3 3 0 0 0 12 9Z"/></svg>
                                        </span>
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--download">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 3a1 1 0 0 1 1 1v9.17l3.59-3.58A1 1 0 1 1 17 11l-5 5-5-5a1 1 0 0 1 1.41-1.41L11 13.17V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1 1v2h12v-2a1 1 0 1 1 2 0v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1Z"/></svg>
                                        </span>
                                    </span>
                                </a>
                                <a class="ll-protocols-card" href="#" download>
                                    <span class="ll-protocols-card__text"><?php esc_html_e('Response plan for emergency situation', 'low-landing'); ?></span>
                                    <span class="ll-protocols-card__actions" aria-hidden="true">
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--view">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 5c-5 0-9.27 3.11-11 7 1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Zm0-8a3 3 0 1 0 .002 6.002A3 3 0 0 0 12 9Z"/></svg>
                                        </span>
                                        <span class="ll-protocols-card__icon ll-protocols-card__icon--download">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 3a1 1 0 0 1 1 1v9.17l3.59-3.58A1 1 0 1 1 17 11l-5 5-5-5a1 1 0 0 1 1.41-1.41L11 13.17V4a1 1 0 0 1 1-1Zm-7 14a1 1 0 0 1 1 1v2h12v-2a1 1 0 1 1 2 0v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1Z"/></svg>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ll-section ll-section--disfruta">
                <div class="ll-disfruta">
                    <div class="ll-disfruta__overlay"></div>
                    <div class="ll-disfruta__content">
                        <h2 class="ll-disfruta__title"><?php esc_html_e('ESPERAMOS QUE DISFRUTES TU VIAJE EN EL CENTRO DE VUELO LAS VIZCACHAS', 'low-landing'); ?></h2>
                        <p class="ll-disfruta__subtitle"><?php esc_html_e('El mejor centro de vuelo para vivir nuevas emociones', 'low-landing'); ?></p>
                    </div>
                </div>
            </section>

            <?php
            echo $this->render_footer_shortcode();

            
