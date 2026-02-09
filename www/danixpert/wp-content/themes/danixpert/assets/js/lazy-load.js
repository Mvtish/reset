/**
 * Lazy Loading - Danixpert
 * Solo procesa imagenes con data-src para evitar reemplazos agresivos.
 */

document.addEventListener('DOMContentLoaded', function() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    if (!lazyImages.length) {
        return;
    }

    const loadImage = (img) => {
        const src = img.getAttribute('data-src');
        if (!src) {
            return;
        }

        img.src = src;
        img.removeAttribute('data-src');
        img.classList.add('loaded');
    };

    if (!('IntersectionObserver' in window)) {
        lazyImages.forEach(loadImage);
        return;
    }

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            }

            loadImage(entry.target);
            observer.unobserve(entry.target);
        });
    }, {
        rootMargin: '200px 0px',
        threshold: 0.01
    });

    lazyImages.forEach(img => imageObserver.observe(img));
});
