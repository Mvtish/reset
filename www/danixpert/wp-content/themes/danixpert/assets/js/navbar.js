/**
 * Navbar JavaScript - Danixpert
 * Maneja el menú móvil y la navegación suave
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // ========================================
        // MENÚ HAMBURGUESA (Toggle)
        // ========================================
        const navbarToggle = $('#navbarToggle');
        const navbarMenu = $('#navbarMenu');
        
        navbarToggle.on('click', function() {
            $(this).toggleClass('active');
            navbarMenu.toggleClass('active');
            $('body').toggleClass('navbar-open', navbarMenu.hasClass('active'));
            
            // Prevenir scroll del body cuando el menú está abierto
            if (navbarMenu.hasClass('active')) {
                $('body').css('overflow', 'hidden');
            } else {
                $('body').css('overflow', '');
            }
        });

        // ========================================
        // CERRAR MENÚ AL HACER CLICK EN UN ENLACE
        // ========================================
        $('.nav-link').on('click', function() {
            // Solo en móvil
            if ($(window).width() <= 768) {
                navbarToggle.removeClass('active');
                navbarMenu.removeClass('active');
                $('body').removeClass('navbar-open');
                $('body').css('overflow', '');
            }
        });

        // ========================================
        // CERRAR MENÚ AL HACER CLICK FUERA
        // ========================================
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.navbar').length) {
                if (navbarMenu.hasClass('active')) {
                    navbarToggle.removeClass('active');
                    navbarMenu.removeClass('active');
                    $('body').removeClass('navbar-open');
                    $('body').css('overflow', '');
                }
            }
        });

        // ========================================
        // NAVEGACIÓN SUAVE (Smooth Scroll)
        // ========================================
        $('.nav-link').on('click', function(e) {
            const href = $(this).attr('href');
            
            // Solo aplicar smooth scroll si es un anchor link (#)
            if (href.startsWith('#')) {
                e.preventDefault();
                
                const target = $(href);
                
                if (target.length) {
                    // Calcular la altura del navbar
                    const navbarHeight = $('.main-header').outerHeight();
                    
                    // Offset adicional para ajustar según la sección
                    let additionalOffset = 0;
                    
                    // Para galería, ajustar para que se vea el título
                    if (href === '#galeria') {
                        // Buscar el título dentro de la sección
                        const galleryTitle = target.find('.gallery-title');
                        if (galleryTitle.length) {
                            additionalOffset = galleryTitle.offset().top - target.offset().top - 20;
                        }
                    }
                    
                    // Scroll suave a la sección
                    $('html, body').animate({
                        scrollTop: target.offset().top + additionalOffset - navbarHeight
                    }, 800, 'swing');
                }
            }
        });

        // ========================================
        // RESALTAR ENLACE ACTIVO AL HACER SCROLL
        // ========================================
        $(window).on('scroll', function() {
            const scrollPos = $(window).scrollTop();
            const navbarHeight = $('.main-header').outerHeight();
            
            $('.nav-link').each(function() {
                const href = $(this).attr('href');
                
                if (href.startsWith('#')) {
                    const section = $(href);
                    
                    if (section.length) {
                        const sectionTop = section.offset().top - navbarHeight - 100;
                        const sectionBottom = sectionTop + section.outerHeight();
                        
                        if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                            $('.nav-link').removeClass('active');
                            $(this).addClass('active');
                        }
                    }
                }
            });
        });

        // ========================================
        // AJUSTAR MENÚ AL CAMBIAR TAMAÑO DE VENTANA
        // ========================================
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                // Cerrar menú móvil y restaurar scroll
                navbarToggle.removeClass('active');
                navbarMenu.removeClass('active');
                $('body').removeClass('navbar-open');
                $('body').css('overflow', '');
            }
        });

        // ========================================
        // NAVBAR TRANSPARENTE/SÓLIDO AL HACER SCROLL (Opcional)
        // ========================================
        /*
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 50) {
                $('.main-header').addClass('scrolled');
            } else {
                $('.main-header').removeClass('scrolled');
            }
        });
        */
    });

})(jQuery);
