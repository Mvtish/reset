/**
 * Sectors Carousel JavaScript - Danixpert
 * Carrusel móvil que muestra 2 tarjetas a la vez
 */

(function($) {
    'use strict';

    const MOBILE_BREAKPOINT = 768;

    let currentIndex = 0;
    let $grid, $cards, $prevBtn, $nextBtn, totalCards;
    let carouselEnabled = false;
    let touchStartX = 0;
    let touchStartY = 0;
    let hasTouchStart = false;

    $(document).ready(function() {
        handleCarouselMode();
        $(window).on('resize', handleCarouselMode);
    });

    function isMobileViewport() {
        return window.matchMedia(`(max-width: ${MOBILE_BREAKPOINT}px)`).matches;
    }

    function getGridGapPx() {
        const gridEl = ($grid && $grid.length) ? $grid[0] : document.querySelector('.sectors-grid');
        if (!gridEl) return 0;

        const styles = window.getComputedStyle(gridEl);

        const columnGap = parseFloat(styles.columnGap);
        if (Number.isFinite(columnGap)) return columnGap;

        const gap = parseFloat(styles.gap);
        if (Number.isFinite(gap)) return gap;

        const rowGap = parseFloat(styles.rowGap);
        if (Number.isFinite(rowGap)) return rowGap;

        return 0;
    }

    function handleCarouselMode() {
        const shouldEnable = isMobileViewport();

        if (shouldEnable && !carouselEnabled) {
            carouselEnabled = true;
            currentIndex = 0;
            initCarousel();
            return;
        }

        if (!shouldEnable && carouselEnabled) {
            carouselEnabled = false;
            destroyCarousel();
            return;
        }

        if (shouldEnable && carouselEnabled) {
            recalcCarousel();
        }
    }

    function initCarousel() {
        $grid = $('.sectors-grid');
        $cards = $('.sector-card');
        $prevBtn = $('#sectorsArrowPrev');
        $nextBtn = $('#sectorsArrowNext');
        
        if ($cards.length === 0) {
            carouselEnabled = false;
            return;
        }
        
        totalCards = $cards.length;
        
        // Calcular y establecer ancho de cards
        const wrapperWidth = $('.sectors-carousel-wrapper').width();
        const gap = getGridGapPx();
        const cardWidth = (wrapperWidth - gap) / 2;
        
        $cards.css({
            'width': cardWidth + 'px',
            'flex': `0 0 ${cardWidth}px`
        });
        
        // Forzar posición inicial en 0
        requestAnimationFrame(function() {
            moveCarousel();
        });
        
        // Remover eventos anteriores
        $nextBtn.off('click.sectorsCarousel');
        $prevBtn.off('click.sectorsCarousel');
        
        // Eventos de navegación
        $nextBtn.on('click.sectorsCarousel', function() {
            if (currentIndex < totalCards - 2) {
                currentIndex++;
                moveCarousel();
            }
        });
        
        $prevBtn.on('click.sectorsCarousel', function() {
            if (currentIndex > 0) {
                currentIndex--;
                moveCarousel();
            }
        });
        
        // Actualizar botones inicialmente
        updateButtons();

        // Swipe (touch)
        const $swipeArea = $('.sectors-carousel-wrapper');
        $swipeArea.off('.sectorsSwipe');

        $swipeArea.on('touchstart.sectorsSwipe', function(event) {
            const touches = event.originalEvent.touches;
            if (!touches || touches.length !== 1) return;

            hasTouchStart = true;
            touchStartX = touches[0].clientX;
            touchStartY = touches[0].clientY;
        });

        $swipeArea.on('touchend.sectorsSwipe', function(event) {
            if (!carouselEnabled) return;
            if (!hasTouchStart) return;
            hasTouchStart = false;

            const changed = event.originalEvent.changedTouches;
            if (!changed || changed.length !== 1) return;

            const dx = changed[0].clientX - touchStartX;
            const dy = changed[0].clientY - touchStartY;
            const swipeThreshold = 50;

            if (Math.abs(dx) < swipeThreshold || Math.abs(dx) < Math.abs(dy)) return;

            if (dx < 0) {
                if (currentIndex < totalCards - 2) {
                    currentIndex++;
                    moveCarousel();
                }
            } else {
                if (currentIndex > 0) {
                    currentIndex--;
                    moveCarousel();
                }
            }
        });

        $swipeArea.on('touchcancel.sectorsSwipe', function() {
            hasTouchStart = false;
        });
    }

    function recalcCarousel() {
        $grid = $('.sectors-grid');
        $cards = $('.sector-card');

        if ($cards.length === 0) return;

        totalCards = $cards.length;

        const wrapperWidth = $('.sectors-carousel-wrapper').width();
        const gap = getGridGapPx();
        const cardWidth = (wrapperWidth - gap) / 2;

        $cards.css({
            'width': cardWidth + 'px',
            'flex': `0 0 ${cardWidth}px`
        });

        moveCarousel();
    }

    function destroyCarousel() {
        const $gridEl = $('.sectors-grid');
        const $cardsEl = $('.sector-card');
        const $prevEl = $('#sectorsArrowPrev');
        const $nextEl = $('#sectorsArrowNext');
        const $wrapperEl = $('.sectors-carousel-wrapper');

        $nextEl.off('click.sectorsCarousel');
        $prevEl.off('click.sectorsCarousel');
        $wrapperEl.off('.sectorsSwipe');

        currentIndex = 0;
        hasTouchStart = false;

        // Clear inline styles applied in mobile
        $gridEl.css('transform', '');
        $cardsEl.css({ 'width': '', 'flex': '' });

        $prevEl.prop('disabled', false);
        $nextEl.prop('disabled', false);
    }

    function moveCarousel() {
        if (!carouselEnabled) return;

        // Obtener el ancho de una card incluyendo el gap
        const cardWidth = $cards.eq(0).outerWidth();
        const gap = getGridGapPx();
        const moveDistance = cardWidth + gap;
        
        // Calcular el desplazamiento
        const translateX = -(currentIndex * moveDistance);
        
        // Aplicar transformación
        $grid.css('transform', `translateX(${translateX}px)`);
        
        // Actualizar estado de botones
        updateButtons();
    }

    function updateButtons() {
        $prevBtn.prop('disabled', currentIndex === 0);
        $nextBtn.prop('disabled', currentIndex >= totalCards - 2);
    }

})(jQuery);
