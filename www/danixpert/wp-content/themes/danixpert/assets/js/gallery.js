/**
 * Gallery Lightbox - Danixpert
 * Abre la imagen en un modal al hacer click.
 */

(function($) {
    'use strict';

    const LIGHTBOX_SELECTOR = '.gallery-lightbox';
    const LIGHTBOX_ACTIVE_CLASS = 'active';
    const BODY_OPEN_CLASS = 'gallery-lightbox-open';

    let $lightbox;
    let $lightboxImage;
    let $lightboxClose;
    let $lightboxPrev;
    let $lightboxNext;
    let lastTriggerElement = null;

    let galleryItems = [];
    let currentIndex = -1;

    function isDesktop() {
        return window.matchMedia && window.matchMedia('(min-width: 769px)').matches;
    }

    function ensureLightbox() {
        const existing = $(LIGHTBOX_SELECTOR);
        if (existing.length) return existing;

        const $el = $(`
            <div class="gallery-lightbox" aria-hidden="true">
                <div class="gallery-lightbox__backdrop" aria-hidden="true"></div>
                <div class="gallery-lightbox__content" role="dialog" aria-modal="true" aria-label="Imagen ampliada">
                    <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--prev" aria-label="Imagen anterior" disabled>&lsaquo;</button>
                    <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--next" aria-label="Imagen siguiente" disabled>&rsaquo;</button>
                    <button type="button" class="gallery-lightbox__close" aria-label="Cerrar">&times;</button>
                    <div class="gallery-lightbox__panel">
                        <img class="gallery-lightbox__image" alt="">
                    </div>
                </div>
            </div>
        `);

        $('body').append($el);
        return $el;
    }

    function buildGalleryItems($items) {
        const items = [];

        ($items || $('.gallery-item')).each(function() {
            const $img = $(this).find('img').first();
            if (!$img.length) return;

            const src = $img.attr('data-full') || $img.data('full') || $img.attr('src');
            if (!src) return;

            items.push({
                src,
                alt: $img.attr('alt') || ''
            });
        });

        return items;
    }

    function updateNavState() {
        if (!$lightboxPrev || !$lightboxNext) return;

        const desktop = isDesktop();
        const hasItems = galleryItems.length > 0;

        $lightboxPrev.prop('disabled', !(desktop && hasItems && currentIndex > 0));
        $lightboxNext.prop('disabled', !(desktop && hasItems && currentIndex < galleryItems.length - 1));
    }

    function setLightboxImage(src, alt) {
        $lightboxImage.attr('src', src || '');
        $lightboxImage.attr('alt', alt || '');
    }

    function loadGridImages($grid) {
        if (!$grid || !$grid.length) return;

        $grid.find('img[data-src]').each(function() {
            const img = this;
            const src = img.getAttribute('data-src');
            if (!src) return;

            img.setAttribute('src', src);
            img.removeAttribute('data-src');
            img.classList.add('loaded');
        });
    }

    function openLightboxAt(index, triggerEl) {
        if (!galleryItems.length) return;
        if (index < 0 || index >= galleryItems.length) return;

        lastTriggerElement = triggerEl || null;
        currentIndex = index;

        const item = galleryItems[currentIndex];
        setLightboxImage(item.src, item.alt);

        $('body').addClass(BODY_OPEN_CLASS);
        $lightbox.addClass(LIGHTBOX_ACTIVE_CLASS).attr('aria-hidden', 'false');

        updateNavState();
    }

    function goToIndex(nextIndex) {
        if (!galleryItems.length) return;
        if (nextIndex < 0 || nextIndex >= galleryItems.length) return;

        currentIndex = nextIndex;
        const item = galleryItems[currentIndex];
        setLightboxImage(item.src, item.alt);

        updateNavState();
    }

    function closeLightbox() {
        if (!$lightbox.hasClass(LIGHTBOX_ACTIVE_CLASS)) return;

        $lightbox.removeClass(LIGHTBOX_ACTIVE_CLASS).attr('aria-hidden', 'true');
        $('body').removeClass(BODY_OPEN_CLASS);

        setLightboxImage('', '');
        galleryItems = [];
        currentIndex = -1;
        updateNavState();

        if (lastTriggerElement && typeof lastTriggerElement.focus === 'function') {
            lastTriggerElement.focus();
        }
        lastTriggerElement = null;
    }

    $(document).ready(function() {
        $lightbox = ensureLightbox();
        $lightboxImage = $lightbox.find('.gallery-lightbox__image');
        $lightboxClose = $lightbox.find('.gallery-lightbox__close');
        $lightboxPrev = $lightbox.find('.gallery-lightbox__nav--prev');
        $lightboxNext = $lightbox.find('.gallery-lightbox__nav--next');

        $(document).on('click', '.gallery-item', function() {
            const $items = $('.gallery-item');
            galleryItems = buildGalleryItems($items);
            const index = $items.index(this);
            openLightboxAt(index, this);
        });

        $(document).on('click', '.gallery-lightbox__close', closeLightbox);

        // Cerrar al hacer click sobre la imagen
        $(document).on('click', '.gallery-lightbox__image', function() {
            if (!isDesktop()) {
                closeLightbox();
            }
        });

        // Navegación (solo PC)
        $(document).on('click', '.gallery-lightbox__nav--prev', function(event) {
            event.preventDefault();
            goToIndex(currentIndex - 1);
        });

        $(document).on('click', '.gallery-lightbox__nav--next', function(event) {
            event.preventDefault();
            goToIndex(currentIndex + 1);
        });

        // Cerrar al hacer click fuera del panel (fondo oscurecido)
        $(document).on('click', '.gallery-lightbox', function(event) {
            if ($(event.target).closest('.gallery-lightbox__panel, .gallery-lightbox__nav, .gallery-lightbox__close').length) return;
            closeLightbox();
        });

        $(document).on('keydown', function(event) {
            if (!$lightbox.hasClass(LIGHTBOX_ACTIVE_CLASS)) return;

            if (event.key === 'Escape') {
                closeLightbox();
                return;
            }

            if (!isDesktop()) return;

            if (event.key === 'ArrowLeft') {
                event.preventDefault();
                goToIndex(currentIndex - 1);
            }

            if (event.key === 'ArrowRight') {
                event.preventDefault();
                goToIndex(currentIndex + 1);
            }
        });

        $(window).on('resize', function() {
            if (!$lightbox.hasClass(LIGHTBOX_ACTIVE_CLASS)) return;
            updateNavState();
        });

        // Paginación de galería
        $('.gallery-page').on('click', function() {
            const page = $(this).data('page');
            
            // Actualizar botones activos
            $('.gallery-page').removeClass('active');
            $(this).addClass('active');
            
            // Mostrar la página correspondiente
            $('.gallery-grid').hide();
            const $targetGrid = $(`.gallery-grid[data-page="${page}"]`);
            $targetGrid.show();
            loadGridImages($targetGrid);
        });
    });

})(jQuery);
