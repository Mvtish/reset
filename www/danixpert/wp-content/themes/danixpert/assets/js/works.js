/**
 * Works Carousel - Responsive (desktop/tablet) + controles móviles.
 */
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.works-carousel');
    if (!carousel) return;

    const track = carousel.querySelector('.works-track');
    const cards = Array.from(carousel.querySelectorAll('.work-card'));

    if (!track || cards.length === 0) return;

    const prevBtn = carousel.querySelector('.works-arrow-prev');
    const nextBtn = carousel.querySelector('.works-arrow-next');

    const mobilePrevBtn = carousel.querySelector('.works-mobile-prev');
    const mobileNextBtn = carousel.querySelector('.works-mobile-next');
    const mobileIndicator = carousel.querySelector('.works-mobile-indicator');

    let currentIndex = 0;

    function isMobile() {
        return window.matchMedia && window.matchMedia('(max-width: 768px)').matches;
    }

    function getVisibleCards() {
        const width = window.innerWidth || document.documentElement.clientWidth || 1200;
        if (width <= 768) return 1;
        if (width <= 1024) return 2;
        return 3;
    }

    function getTrackGapPx() {
        const styles = window.getComputedStyle(track);
        const gap = styles.columnGap || styles.gap || '0px';
        const gapPx = Number.parseFloat(gap);
        return Number.isFinite(gapPx) ? gapPx : 0;
    }

    function getCardWidthPx() {
        const firstCard = cards[0];
        if (!firstCard) return 0;
        return firstCard.getBoundingClientRect().width || 0;
    }

    function clampIndex() {
        const visibleCards = getVisibleCards();
        const maxIndex = Math.max(0, cards.length - visibleCards);
        currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);
        return maxIndex;
    }

    function ensureMobileIndicator() {
        if (!mobileIndicator) return;

        const existingBars = mobileIndicator.querySelectorAll('.works-mobile-indicator-bar');
        if (existingBars.length === cards.length) return;

        mobileIndicator.innerHTML = '';
        for (let i = 0; i < cards.length; i++) {
            const bar = document.createElement('span');
            bar.className = 'works-mobile-indicator-bar';
            mobileIndicator.appendChild(bar);
        }
    }

    function updateMobileIndicator() {
        if (!mobileIndicator) return;

        ensureMobileIndicator();
        const bars = mobileIndicator.querySelectorAll('.works-mobile-indicator-bar');
        bars.forEach((bar, index) => {
            bar.classList.toggle('is-active', index === currentIndex);
        });
    }

    function updateButtons(maxIndex) {
        const atStart = currentIndex === 0;
        const atEnd = currentIndex >= maxIndex;

        if (prevBtn) prevBtn.style.visibility = atStart ? 'hidden' : 'visible';
        if (nextBtn) nextBtn.style.visibility = atEnd ? 'hidden' : 'visible';

        if (mobilePrevBtn) mobilePrevBtn.disabled = atStart;
        if (mobileNextBtn) mobileNextBtn.disabled = atEnd;
    }

    function updateCarousel() {
        const gap = getTrackGapPx();
        const cardWidth = getCardWidthPx();
        const visibleCards = getVisibleCards();
        const maxIndex = clampIndex();

        let offset;
        
        // Si estamos en el último índice en desktop y hay 5 tarjetas
        if (!isMobile() && visibleCards === 3 && cards.length === 5 && currentIndex === maxIndex) {
            // Mostrar las últimas 2 tarjetas completas (tarjetas 4 y 5)
            // Offset = 3 tarjetas completas + 3 gaps
            offset = 3 * (cardWidth + gap);
        } else {
            // Comportamiento normal
            offset = currentIndex * (cardWidth + gap);
        }
        
        track.style.transform = `translateX(-${offset}px)`;

        updateButtons(maxIndex);

        if (isMobile()) {
            updateMobileIndicator();
        }
    }

    function goPrev() {
        if (currentIndex <= 0) return;
        currentIndex -= 1;
        updateCarousel();
    }

    function goNext() {
        const maxIndex = clampIndex();
        if (currentIndex >= maxIndex) return;
        currentIndex += 1;
        updateCarousel();
    }

    if (prevBtn) prevBtn.addEventListener('click', goPrev);
    if (nextBtn) nextBtn.addEventListener('click', goNext);
    if (mobilePrevBtn) mobilePrevBtn.addEventListener('click', goPrev);
    if (mobileNextBtn) mobileNextBtn.addEventListener('click', goNext);

    // Swipe (touch)
    let touchStartX = 0;
    let touchStartY = 0;
    let hasTouchStart = false;

    function onTouchStart(event) {
        if (!event.touches || event.touches.length !== 1) return;
        hasTouchStart = true;
        touchStartX = event.touches[0].clientX;
        touchStartY = event.touches[0].clientY;
    }

    function onTouchEnd(event) {
        if (!hasTouchStart) return;
        hasTouchStart = false;

        if (!event.changedTouches || event.changedTouches.length !== 1) return;

        const endX = event.changedTouches[0].clientX;
        const endY = event.changedTouches[0].clientY;

        const dx = endX - touchStartX;
        const dy = endY - touchStartY;
        const swipeThreshold = 50;

        if (Math.abs(dx) < swipeThreshold || Math.abs(dx) < Math.abs(dy)) return;

        if (dx < 0) {
            goNext();
        } else {
            goPrev();
        }
    }

    function onTouchCancel() {
        hasTouchStart = false;
    }

    carousel.addEventListener('touchstart', onTouchStart);
    carousel.addEventListener('touchend', onTouchEnd);
    carousel.addEventListener('touchcancel', onTouchCancel);

    // Inicializar
    ensureMobileIndicator();
    updateCarousel();

    let resizeTimer;
    window.addEventListener('resize', function() {
        window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(updateCarousel, 100);
    });
});
