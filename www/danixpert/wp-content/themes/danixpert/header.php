<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="geo.region" content="CL" />
    <meta name="geo.placename" content="Chile" />
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="main-header">
    <nav class="navbar" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <div class="navbar-container">
            <!-- Logo -->
            <div class="navbar-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="Danixpert - Inicio">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Danixpert - Expertos en Seguridad y Alarmas" width="80" height="80">
                </a>
            </div>

            <!-- Menú de navegación -->
            <ul class="navbar-menu" id="navbarMenu">
                <li><a href="#inicio" class="nav-link" itemprop="url">Inicio</a></li>
                <li><a href="#galeria" class="nav-link" itemprop="url">Galería</a></li>
                <li><a href="#marcas" class="nav-link" itemprop="url">Marcas</a></li>
                <li><a href="#mis-trabajos" class="nav-link" itemprop="url">Mis Trabajos</a></li>
                <li><a href="#servicios" class="nav-link" itemprop="url">Servicios</a></li>

                <!-- Contacto en el menú móvil -->
                <div class="navbar-menu-contact">
                    <a href="mailto:ventas.danixpert@gmail.com" class="navbar-menu-contact-item">
                        <div class="navbar-menu-contact-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.webp" alt="Email">
                        </div>
                        <div class="navbar-menu-contact-text">ventas.danixpert@gmail.com</div>
                    </a>
                    <a href="https://wa.me/56998549337" class="navbar-menu-contact-item" target="_blank">
                        <div class="navbar-menu-contact-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Phone call.webp" alt="WhatsApp">
                        </div>
                        <div class="navbar-menu-contact-text">+56998549337</div>
                    </a>
                </div>
            </ul>

            <!-- Información de contacto -->
            <div class="navbar-contact">
                <div class="contact-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Phone call.webp" alt="Teléfono">
                </div>
                <div class="contact-info">
                    <div class="contact-phone">+56998549337</div>
                    <div class="contact-email">ventas.danixpert@gmail.com</div>
                </div>
            </div>

            <!-- Botón hamburguesa para móvil -->
            <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </nav>
</header>

<div class="navbar-backdrop" aria-hidden="true"></div>
