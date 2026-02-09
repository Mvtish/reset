/**
 * Hero Carousel JavaScript - Danixpert
 * Maneja el carrusel hero con navegación automática y manual
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        const carousel = {
            slides: $('.hero-slide'),
            indicators: $('.hero-indicator'),
            prevBtn: $('.hero-arrow-prev'),
            nextBtn: $('.hero-arrow-next'),
            currentSlide: 0,
            totalSlides: $('.hero-slide').length,
            autoplayInterval: null,
            autoplayDelay: 30000, // 30 segundos
            isTransitioning: false
        };

        // ========================================
        // FUNCIÓN PARA CAMBIAR DE SLIDE
        // ========================================
        function goToSlide(index) {
            if (carousel.isTransitioning) return;
            
            // Validar índice
            if (index < 0) {
                index = carousel.totalSlides - 1;
            } else if (index >= carousel.totalSlides) {
                index = 0;
            }

            carousel.isTransitioning = true;

            // Remover clase active de todos
            carousel.slides.removeClass('active');
            carousel.indicators.removeClass('active');

            // Agregar clase active al nuevo slide
            carousel.slides.eq(index).addClass('active');
            carousel.indicators.eq(index).addClass('active');

            // Actualizar índice actual
            carousel.currentSlide = index;

            // Permitir nueva transición después de 1 segundo
            setTimeout(function() {
                carousel.isTransitioning = false;
            }, 1000);
        }

        // ========================================
        // NAVEGACIÓN CON FLECHAS
        // ========================================
        carousel.prevBtn.on('click', function() {
            stopAutoplay();
            goToSlide(carousel.currentSlide - 1);
            startAutoplay();
        });

        carousel.nextBtn.on('click', function() {
            stopAutoplay();
            goToSlide(carousel.currentSlide + 1);
            startAutoplay();
        });

        // ========================================
        // NAVEGACIÓN CON INDICADORES
        // ========================================
        carousel.indicators.on('click', function() {
            const slideIndex = $(this).data('slide');
            stopAutoplay();
            goToSlide(slideIndex);
            startAutoplay();
        });

        // ========================================
        // NAVEGACIÓN CON TECLADO
        // ========================================
        $(document).on('keydown', function(e) {
            // Flecha izquierda
            if (e.keyCode === 37) {
                stopAutoplay();
                goToSlide(carousel.currentSlide - 1);
                startAutoplay();
            }
            // Flecha derecha
            else if (e.keyCode === 39) {
                stopAutoplay();
                goToSlide(carousel.currentSlide + 1);
                startAutoplay();
            }
        });

        // ========================================
        // NAVEGACIÓN CON SWIPE (Touch)
        // ========================================
        let touchStartX = 0;
        let touchEndX = 0;

        $('.hero-carousel').on('touchstart', function(e) {
            touchStartX = e.originalEvent.touches[0].clientX;
        });

        $('.hero-carousel').on('touchend', function(e) {
            touchEndX = e.originalEvent.changedTouches[0].clientX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                stopAutoplay();
                
                if (diff > 0) {
                    // Swipe left - siguiente
                    goToSlide(carousel.currentSlide + 1);
                } else {
                    // Swipe right - anterior
                    goToSlide(carousel.currentSlide - 1);
                }
                
                startAutoplay();
            }
        }

        // ========================================
        // AUTOPLAY
        // ========================================
        function startAutoplay() {
            carousel.autoplayInterval = setInterval(function() {
                goToSlide(carousel.currentSlide + 1);
            }, carousel.autoplayDelay);
        }

        function stopAutoplay() {
            if (carousel.autoplayInterval) {
                clearInterval(carousel.autoplayInterval);
            }
        }

        // ========================================
        // PAUSAR AUTOPLAY AL HACER HOVER
        // ========================================
        $('.hero-carousel').on('mouseenter', function() {
            stopAutoplay();
        });

        $('.hero-carousel').on('mouseleave', function() {
            startAutoplay();
        });

        // ========================================
        // PAUSAR AUTOPLAY CUANDO LA PESTAÑA NO ESTÁ VISIBLE
        // ========================================
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                stopAutoplay();
            } else {
                startAutoplay();
            }
        });

        // ========================================
        // INICIAR AUTOPLAY
        // ========================================
        startAutoplay();

        // ========================================
        // SMOOTH SCROLL PARA LOS BOTONES
        // ========================================
        $('.hero-buttons a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const target = $($(this).attr('href'));
            
            if (target.length) {
                const navbarHeight = $('.main-header').outerHeight();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - navbarHeight
                }, 800, 'swing');
            }
        });

        // ========================================
        // LAZY LOADING DE IMÁGENES (Opcional)
        // ========================================
        /*
        function lazyLoadImages() {
            $('.hero-image img').each(function() {
                const img = $(this);
                const src = img.data('src');
                
                if (src) {
                    img.attr('src', src);
                    img.removeAttr('data-src');
                }
            });
        }
        
        lazyLoadImages();
        */

    });

})(jQuery);
