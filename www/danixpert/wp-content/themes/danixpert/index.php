<?php
/**
 * Template Name: Landing Page
 */

get_header(); ?>

<main id="main-content">
    <!-- Sección Hero/Inicio - Carrusel -->
    <section id="inicio" class="hero-section">
        <div class="hero-carousel">
            <!-- Slide 1 -->
            <div class="hero-slide active">
                <div class="hero-image">
                    <img class="hero-image-desktop" loading="eager" fetchpriority="high" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/images/foto_carrusel1.webp" alt="Seguridad profesional">
                    <img class="hero-image-mobile" loading="eager" fetchpriority="high" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/images/movil.carrusel1.png" alt="Seguridad profesional">
                </div>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-container">
                        <p class="hero-subtitle">Soluciones profesionales en seguridad para hogares y empresas</p>
                        <h1 class="hero-title">Instalación de cámaras, alarmas, redes y sistemas de acceso con certificación Hikvision.</h1>
                        <p class="hero-description">Ofrecemos implementación, mantención y soporte remoto de sistemas de seguridad y conectividad, trabajando con marcas líderes y tecnología de última generación.</p>
                        <div class="hero-buttons">
                            <a href="#servicios" class="btn btn-primary">Explora nuestros servicios</a>
                            <a href="#mis-trabajos" class="btn btn-secondary">Mira nuestros trabajos</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide">
                <div class="hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero2.webp" alt="Solución de cámaras y Wifi">
                </div>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-container">
                        <p class="hero-subtitle">Conectividad y seguridad para tu espacio</p>
                        <h1 class="hero-title">Solución de Cámaras Wifi, para domicilios y pequeñas oficinas.</h1>
                        <p class="hero-description">Implementamos sistemas de videovigilancia y redes inalámbricas optimizadas para hogares y oficinas pequeñas, garantizando cobertura completa y conexión estable.</p>
                        <div class="hero-buttons">
                            <a href="#servicios" class="btn btn-primary">Explora nuestros servicios</a>
                            <a href="#mis-trabajos" class="btn btn-secondary">Mira nuestros trabajos</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide">
                <div class="hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero3.webp" alt="Servicios de redes y fibra óptica">
                </div>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-container">
                        <p class="hero-subtitle">Infraestructura de red profesional</p>
                        <h1 class="hero-title">Servicios de Redes inalámbricas, cableado estructurado y fibra óptica.</h1>
                        <p class="hero-description">Instalación y configuración de redes WiFi empresariales, cableado estructurado certificado y fusión de fibra óptica para conexiones de alta velocidad y estabilidad.</p>
                        <div class="hero-buttons">
                            <a href="#servicios" class="btn btn-primary">Explora nuestros servicios</a>
                            <a href="#mis-trabajos" class="btn btn-secondary">Mira nuestros trabajos</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flechas de navegación -->
            <button class="hero-arrow hero-arrow-prev" aria-label="Anterior">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18L9 12L15 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="hero-arrow hero-arrow-next" aria-label="Siguiente">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <!-- Indicadores de navegación -->
            <div class="hero-indicators">
                <button class="hero-indicator active" data-slide="0" aria-label="Ir a slide 1"></button>
                <button class="hero-indicator" data-slide="1" aria-label="Ir a slide 2"></button>
                <button class="hero-indicator" data-slide="2" aria-label="Ir a slide 3"></button>
            </div>
        </div>
    </section>

    <!-- Sección Protección y Conectividad -->
    <section id="proteccion" class="protection-section">
        <div class="protection-container">
            <!-- Columna izquierda - Contenido -->
            <div class="protection-content">
                <h2 class="protection-title">Protección y conectividad para hogares, negocios y edificios</h2>
                
                <div class="protection-text-block">
                    <p class="protection-description">
                        Brindamos soluciones de seguridad y redes diseñadas para mejorar la protección y el funcionamiento de tus espacios. Instalamos sistemas de cámaras, citofonía, control de acceso y conectividad de alta calidad, utilizando tecnología Hikvision y otras marcas líderes del mercado.
                    </p>
                    <p class="protection-description">
                        Con certificaciones hcsa Hikvision en CCTV y experiencia en proyectos residenciales y comerciales, garantizamos un servicio confiable y adaptado a tus necesidades.
                    </p>
                </div>

                <div class="protection-text-block">
                    <p class="protection-description">
                        Nos hacemos cargo de todo: instalación, configuración y soporte remoto. Activamos tu sistema, lo dejamos funcionando y te enseñamos a usarlo.
                    </p>
                </div>

                <div class="protection-services">
                    <h3 class="protection-services-title">Más protección con monitoreo:</h3>
                    
                    <ul class="protection-services-list">
                        <li class="protection-service-item">
                            <span class="service-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="#00C8FF" stroke-width="2"/>
                                    <path d="M8 12L11 15L16 9" stroke="#00C8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="service-text">Instalación de cámaras de seguridad (CCTV)</span>
                        </li>
                        <li class="protection-service-item">
                            <span class="service-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="#00C8FF" stroke-width="2"/>
                                    <path d="M8 12L11 15L16 9" stroke="#00C8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="service-text">Control de acceso para hogares y empresas</span>
                        </li>
                        <li class="protection-service-item">
                            <span class="service-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="#00C8FF" stroke-width="2"/>
                                    <path d="M8 12L11 15L16 9" stroke="#00C8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="service-text">Configuración de redes y conectividad</span>
                        </li>
                        <li class="protection-service-item">
                            <span class="service-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="#00C8FF" stroke-width="2"/>
                                    <path d="M8 12L11 15L16 9" stroke="#00C8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="service-text">Citofonía y comunicación interna</span>
                        </li>
                        <li class="protection-service-item">
                            <span class="service-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="#00C8FF" stroke-width="2"/>
                                    <path d="M8 12L11 15L16 9" stroke="#00C8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="service-text">Instalación y fusión de fibra óptica</span>
                        </li>
                        <li class="protection-service-item">
                            <span class="service-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="#00C8FF" stroke-width="2"/>
                                    <path d="M8 12L11 15L16 9" stroke="#00C8FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="service-text">Asistencia remota con AnyDesk o TeamViewer</span>
                        </li>
                    </ul>
                </div>

                <div class="protection-buttons">
                    <a href="#servicios" class="btn btn-primary-dark">Explora nuestros servicios</a>
                    <a href="#mis-trabajos" class="btn btn-secondary-dark">Mira nuestros trabajos</a>
                </div>
            </div>

            <!-- Columna derecha - Video y Logo -->
            <div class="protection-visual">
                <div class="protection-image">
                    <video controls controlsList="nodownload noplaybackrate" muted loop playsinline preload="metadata" poster="<?php echo get_template_directory_uri(); ?>/assets/images/image%201.webp">
                        <source src="<?php echo get_template_directory_uri(); ?>/assets/images/video.mp4" type="video/mp4">
                        Tu navegador no soporta el elemento de video.
                    </video>
                </div>
                <div class="protection-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Hikvision.webp" alt="Hikvision Logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección ¡Protege lo que más importa! -->
    <section id="sectores" class="sectors-section">
        <div class="sectors-background"></div>
        <div class="sectors-overlay"></div>
        <div class="sectors-container">
            <div class="sectors-header">
                <h2 class="sectors-title">¡Protege lo que más importa!</h2>
                <div class="sectors-description">
                    <p>Nuestro compromiso es entregar soluciones de seguridad y conectividad confiables para hogares, empresas y diferentes tipos de instalaciones. Trabajamos con tecnología certificada y marcas reconocidas para asegurar sistemas estables, duraderos y adaptados a las necesidades de cada cliente.</p>
                    <p>Desde cámaras de seguridad hasta redes y control de acceso, ofrecemos instalación profesional y soporte dedicado para garantizar tranquilidad en cada proyecto.</p>
                </div>
            </div>

            <div class="sectors-carousel-wrapper">
                <div class="sectors-grid">
                    <!-- Tarjeta 1 -->
                    <div class="sector-card">
                        <div class="sector-content">
                            <span class="sector-number">01</span>
                            <h3 class="sector-name">Centros de salud</h3>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="sector-card">
                        <div class="sector-content">
                            <span class="sector-number">02</span>
                            <h3 class="sector-name">Hogar / Residencial y Oficinas Retail</h3>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="sector-card">
                        <div class="sector-content">
                            <span class="sector-number">03</span>
                            <h3 class="sector-name">Estacionamientos y Galpones</h3>
                        </div>
                    </div>

                    <!-- Tarjeta 4 -->
                    <div class="sector-card">
                        <div class="sector-content">
                            <span class="sector-number">04</span>
                            <h3 class="sector-name">Bodegas, Almacenes e Inmoviliarias</h3>
                        </div>
                    </div>

                    <!-- Tarjeta 5 -->
                    <div class="sector-card">
                        <div class="sector-content">
                            <span class="sector-number">05</span>
                            <h3 class="sector-name">Agrícolas y Frutícolas</h3>
                        </div>
                    </div>
                </div>
                
                <!-- Botones de navegación -->
                <div class="sectors-navigation">
                    <button class="sectors-arrow sectors-arrow-prev" id="sectorsArrowPrev" aria-label="Anterior">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="sectors-arrow sectors-arrow-next" id="sectorsArrowNext" aria-label="Siguiente">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Servicios -->
    <section id="servicios" class="services-section">
        <div class="services-container">
            <!-- Columna izquierda -->
            <div class="services-left">
                <p class="services-subtitle">Encuentra tranquilidad con monitoreo 24/7</p>
                <h2 class="services-title">Sistemas de seguridad confiables que se adaptan a tu negocio.</h2>
            </div>
            
            <!-- Columna derecha -->
            <div class="services-right">
                <p class="services-description">
                    Instalamos soluciones de seguridad a medida para empresas y comercios, combinando cámaras CCTV, alarmas y control de acceso con tecnología certificada. Nuestro enfoque prioriza una instalación profesional, sistemas estables y soporte dedicado para garantizar la continuidad operativa de tu negocio.
                </p>

                <div class="services-buttons">
                    <a href="#servicios" class="btn btn-primary">Explora nuestros servicios</a>
                    <a href="#mis-trabajos" class="btn btn-secondary">Mira nuestros trabajos</a>
                </div>
            </div>
        </div>

        <!-- Tarjetas de servicios que se posicionan entre las dos secciones -->
        <div class="services-cards">
            <!-- Tarjeta 1 - CCTV -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/camara.webp" alt="Sistemas de CCTV">
                </div>
                <h3 class="service-card-title">Sistemas de CCTV</h3>
                <p class="service-card-description">
                    Instalación de cámaras de seguridad con equipos de alta resolución, configuración remota y almacenamiento seguro. Ideal para monitoreo continuo y prevención de incidentes.
                </p>
            </div>

            <!-- Tarjeta 2 - Alarmas y sensores -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/alarma.webp" alt="Alarmas y sensores">
                </div>
                <h3 class="service-card-title">Alarmas y sensores</h3>
                <p class="service-card-description">
                    Implementación de sistemas de alarma para oficinas, bodegas y locales comerciales, con notificaciones en tiempo real y respuesta inmediata.
                </p>
            </div>

            <!-- Tarjeta 3 - Control de acceso -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/control.webp" alt="Control de acceso">
                </div>
                <h3 class="service-card-title">Control de acceso</h3>
                <p class="service-card-description">
                    Soluciones para puertas, oficinas y áreas restringidas mediante lectores, tarjetas o códigos, asegurando un flujo controlado y seguro.
                </p>
            </div>

            <!-- Tarjeta 4 - Redes y cableado -->
            <div class="service-card">
                <div class="service-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/redes.webp" alt="Redes y cableado estructurado">
                </div>
                <h3 class="service-card-title">Redes y cableado estructurado</h3>
                <p class="service-card-description">
                    Instalación profesional de redes internas para cámaras, equipos y sistemas, garantizando estabilidad, velocidad y orden técnico.
                </p>
            </div>
        </div>
    </section>

    <!-- Sección Galería -->
    <section id="galeria" class="gallery-section">
        <div class="gallery-container">
            <h2 class="gallery-title">Galería</h2>
            
            <!-- Página 1: Imágenes 1-9 -->
            <div class="gallery-grid" data-page="1">
                <!-- Fila 1 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/1-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/1.webp" alt="Proyecto de seguridad 1">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/2-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/2.webp" alt="Proyecto de seguridad 2">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/3-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/3.webp" alt="Proyecto de seguridad 3">
                </div>
                <!-- Fila 2 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/4-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/4.webp" alt="Proyecto de seguridad 4">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/5-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/5.webp" alt="Proyecto de seguridad 5">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/6-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/6.webp" alt="Proyecto de seguridad 6">
                </div>
                <!-- Fila 3 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/7-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/7.webp" alt="Proyecto de seguridad 7">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/8-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/8.webp" alt="Proyecto de seguridad 8">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/9-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/9.webp" alt="Proyecto de seguridad 9">
                </div>
            </div>

            <!-- Página 2: Imágenes 10-18 -->
            <div class="gallery-grid" data-page="2" style="display: none;">
                <!-- Fila 1 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/10-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/10.webp" alt="Proyecto de seguridad 10">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/11-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/11.webp" alt="Proyecto de seguridad 11">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/12-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/12.webp" alt="Proyecto de seguridad 12">
                </div>
                <!-- Fila 2 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/13-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/13.webp" alt="Proyecto de seguridad 13">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/14-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/14.webp" alt="Proyecto de seguridad 14">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/15-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/15.webp" alt="Proyecto de seguridad 15">
                </div>
                <!-- Fila 3 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/16-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/16.webp" alt="Proyecto de seguridad 16">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/17-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/17.webp" alt="Proyecto de seguridad 17">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/18-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/18.webp" alt="Proyecto de seguridad 18">
                </div>
            </div>

            <!-- Página 3: Imágenes 19-27 -->
            <div class="gallery-grid" data-page="3" style="display: none;">
                <!-- Fila 1 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/19-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/19.webp" alt="Proyecto de seguridad 19">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/20-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/20.webp" alt="Proyecto de seguridad 20">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/21-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/21.webp" alt="Proyecto de seguridad 21">
                </div>
                <!-- Fila 2 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/22-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/22.webp" alt="Proyecto de seguridad 22">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/23-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/23.webp" alt="Proyecto de seguridad 23">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/24-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/24.webp" alt="Proyecto de seguridad 24">
                </div>
                <!-- Fila 3 -->
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/25-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/25.webp" alt="Proyecto de seguridad 25">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/26-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/26.webp" alt="Proyecto de seguridad 26">
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1 1%22%3E%3C/svg%3E" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/27-thumb.webp" data-full="<?php echo get_template_directory_uri(); ?>/assets/images/27.webp" alt="Proyecto de seguridad 27">
                </div>
            </div>

            <div class="gallery-pagination">
                <button class="gallery-page active" data-page="1" aria-label="Página 1">1</button>
                <button class="gallery-page" data-page="2" aria-label="Página 2">2</button>
                <button class="gallery-page" data-page="3" aria-label="Página 3">3</button>
            </div>
        </div>
    </section>

    <!-- Sección Mis Trabajos -->
    <section id="mis-trabajos" class="works-section">
        <div class="works-container">
            <!-- Header con título y descripción -->
            <div class="works-header">
                <div class="works-header-left">
                    <h2 class="works-title">Nuestros trabajos realizados con soluciones de CCTV, alarmas y control de acceso.</h2>
                </div>
                <div class="works-header-right">
                    <p class="works-description">Te mostramos una selección de instalaciones que hemos realizado para distintos tipos de negocios.</p>
                    <p class="works-description">Cada proyecto refleja nuestro compromiso con la seguridad, la calidad técnica y la correcta implementación de sistemas de monitoreo, CCTV, alarmas y control de acceso.</p>
                </div>
            </div>

            <!-- Carrusel de proyectos -->
            <div class="works-carousel">
                <!-- Botón anterior -->
                <button class="works-arrow works-arrow-prev" aria-label="Anterior">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <div class="works-track">
                    <!-- Proyecto 1 -->
                    <div class="work-card">
                        <div class="work-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tarjeta2.webp" alt="Sistema brazo hidráulico">
                            <span class="work-tag">Sistema brazo hidráulico</span>
                        </div>
                        <div class="work-content">
                            <h3 class="work-card-title">Área exterior / Fachada</h3>
                            <p class="work-card-description">Brazos hidráulicos Marca SEA mini tank S con automatización video portero Hikvision kit kis603.</p>
                            <p class="work-card-description">Apertura desde cualquier lugar del mundo (solo conectando tu teléfono a internet)</p>
                        </div>
                    </div>

                    <!-- Proyecto 2 -->
                    <div class="work-card">
                        <div class="work-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tarjeta3.webp" alt="Sistema Alarma">
                            <span class="work-tag">Sistema Alarma</span>
                        </div>
                        <div class="work-content">
                            <h3 class="work-card-title">Intrusión</h3>
                            <p class="work-card-description">Ax pro 100% Inalámbrico funcionando desde app hik-connect monitoreo 24/7 por el mismo cliente, sin contratos ni mensualidades.</p>
                        </div>
                    </div>

                    <!-- Proyecto 3 -->
                    <div class="work-card">
                        <div class="work-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tarjeta4.webp" alt="Mantenimiento">
                            <span class="work-tag">Mantenimiento</span>
                        </div>
                        <div class="work-content">
                            <h3 class="work-card-title">Rack CCTV / Cámaras 3k</h3>
                            <p class="work-card-description">Mantenimiento a sus sistemas CCTV, garantía de 1 año, cambio de fuentes, video baluns y estandarizamos su sistemas para evitar fallos a corto plazo.</p>
                        </div>
                    </div>

                    <!-- Proyecto 4 -->
                    <div class="work-card">
                        <div class="work-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tarjeta5.webp" alt="Sistemas industrializados">
                            <span class="work-tag">Sistemas industrializados</span>
                        </div>
                        <div class="work-content">
                            <h3 class="work-card-title">Área Industrial</h3>
                            <p class="work-card-description">Trabajamos con las mejores marcas de equipos en seguridad de CCTV Hikvision y radio enlaces Ubiquiti.</p>
                        </div>
                    </div>

                    <!-- Proyecto 5 -->
                    <div class="work-card">
                        <div class="work-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tarjeta6.webp" alt="Controles de acceso">
                            <span class="work-tag">Controles de acceso</span>
                        </div>
                        <div class="work-content">
                            <h3 class="work-card-title">Procesos de seguridad</h3>
                            <p class="work-card-description">Ingreso controlado, gestión de horarios, anti-passback y más soluciones!</p>
                        </div>
                    </div>
                </div>

                <!-- Botón siguiente -->
                <button class="works-arrow works-arrow-next" aria-label="Siguiente">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- Controles solo mÛvil -->
                <div class="works-mobile-controls">
                    <div class="works-mobile-indicator"></div>
                    <div class="works-mobile-buttons">
                        <button type="button" class="works-mobile-btn works-mobile-prev" aria-label="Anterior">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button type="button" class="works-mobile-btn works-mobile-next" aria-label="Siguiente">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ancla y línea para Marcas -->
        <div id="marcas" class="marcas-divider"></div>
        
        <div class="works-container">
            <p class="marcas-subtitle">Marcas con las cuales trabajo</p>
            
            <!-- Carrusel de marcas -->
            <div class="marcas-carousel-wrapper">
                <div class="marcas-carousel">
                    <div class="marcas-track">
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Hikvision 1.webp" alt="Hikvision">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ubiquiti_Logo_Horizontal 1.webp" alt="Ubiquiti">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ezviz-logo_brandlogos.net_z9wlt 1.webp" alt="EZVIZ">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/huawei-logo 1.webp" alt="Huawei">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tp-Link_logo_2016 1.webp" alt="TP-Link">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tenda_LOGO 1.webp" alt="Tenda">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Western-Digital-Logo 1.webp" alt="Western Digital">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2560px-Seagate_logo.svg 1.webp" alt="Seagate">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Furukawa_Electric-Logo.wine 1.webp" alt="Furukawa">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/3Z-NETWORK 1.webp" alt="3Z Network">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ATC-Logo-2022-1080px 1.webp" alt="ATC">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/witek 1.webp" alt="Witek">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-lexo0297 1.webp" alt="Lexo">
                        </div>
                        
                        <!-- Duplicado para loop infinito -->
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Hikvision 1.webp" alt="Hikvision">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ubiquiti_Logo_Horizontal 1.webp" alt="Ubiquiti">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ezviz-logo_brandlogos.net_z9wlt 1.webp" alt="EZVIZ">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/huawei-logo 1.webp" alt="Huawei">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tp-Link_logo_2016 1.webp" alt="TP-Link">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tenda_LOGO 1.webp" alt="Tenda">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Western-Digital-Logo 1.webp" alt="Western Digital">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2560px-Seagate_logo.svg 1.webp" alt="Seagate">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Furukawa_Electric-Logo.wine 1.webp" alt="Furukawa">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/3Z-NETWORK 1.webp" alt="3Z Network">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ATC-Logo-2022-1080px 1.webp" alt="ATC">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/witek 1.webp" alt="Witek">
                        </div>
                        <div class="marca-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-lexo0297 1.webp" alt="Lexo">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer dentro del contenedor -->
            <footer class="main-footer">
                <div class="footer-container">
                    <!-- Logo -->
                    <div class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_footer.webp" alt="Danixpert">
                    </div>

                    <!-- Enlaces Directos -->
                    <div class="footer-section">
                        <h3 class="footer-title">Enlaces Directos</h3>
                        <ul class="footer-links">
                            <li><a href="#servicios">Servicios</a></li>
                            <li><a href="#marcas">Marcas</a></li>
                            <li><a href="#mis-trabajos">Mis trabajos</a></li>
                            <li><a href="#galeria">Galería</a></li>
                        </ul>
                    </div>

                    <!-- Contacto -->
                    <div class="footer-section">
                        <h3 class="footer-title">Contacto</h3>
                        <p class="footer-contact-text">Si tienes alguna pregunta o necesitas ayuda, siéntete libre de contactar a nuestro equipo.</p>
                    </div>

                    <!-- Iconos de contacto -->
                    <div class="footer-contact-icons">
                        <div class="footer-contact-item">
                            <div class="footer-icon-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ellipse 19.webp" alt="" class="footer-icon-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ellipse 20.webp" alt="" class="footer-icon-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.webp" alt="Email" class="footer-icon-img">
                            </div>
                            <a href="mailto:ventas.danixpert@gmail.com" class="footer-contact-link">
                                <span>ventas.danixpert@gmail.com</span>
                            </a>
                        </div>
                        
                        <div class="footer-contact-item">
                            <div class="footer-icon-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ellipse 19.webp" alt="" class="footer-icon-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Ellipse 20.webp" alt="" class="footer-icon-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.webp" alt="WhatsApp" class="footer-icon-img">
                            </div>
                            <a href="https://wa.me/56998549337" class="footer-contact-link" target="_blank">
                                <span>+56998549337</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="footer-copyright">
                    <p class="copyright-full">© 2025 Dani Xpert, Todos los derechos reservados - Covenant Studio.</p>
                    <p class="copyright-short">© 2025 Dani Xpert</p>
                </div>
            </footer>
        </div>
    </section>
</main>

<?php wp_footer(); ?>
</body>
</html>
