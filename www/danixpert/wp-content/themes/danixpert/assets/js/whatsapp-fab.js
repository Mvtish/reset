/**
 * WhatsApp Floating Bubble - Danixpert
 * Draggable between corners with snap + localStorage.
 */

(function() {
    'use strict';

    function initWhatsAppFab() {
        const fab = document.getElementById('whatsappFab');
        if (!fab) return;

        const storageKey = 'danixpert_whatsapp_fab_corner';
        const defaultCorner = 'bottom-right';

        function normalizeCorner(value) {
            if (!value) return null;

            const lower = String(value).toLowerCase();
            const isTop = lower.indexOf('top') !== -1;
            const isBottom = lower.indexOf('bottom') !== -1;
            const isLeft = lower.indexOf('left') !== -1;
            const isRight = lower.indexOf('right') !== -1;

            if ((isTop || isBottom) && (isLeft || isRight)) {
                return `${isTop ? 'top' : 'bottom'}-${isLeft ? 'left' : 'right'}`;
            }

            if (isLeft) return 'bottom-left';
            if (isRight) return 'bottom-right';
            return null;
        }

        const savedCorner = (() => {
            try {
                return window.localStorage.getItem(storageKey);
            } catch (_) {
                return null;
            }
        })();

        const normalizedSaved = normalizeCorner(savedCorner);
        const normalizedInitial = normalizeCorner(fab.dataset.corner);
        fab.dataset.corner = normalizedSaved || normalizedInitial || defaultCorner;

        function updateHeaderOffset() {
            const header = document.querySelector('.main-header');
            const height = header ? header.getBoundingClientRect().height : 0;
            fab.style.setProperty('--whatsapp-fab-header-offset', `${height}px`);
        }

        updateHeaderOffset();
        window.addEventListener('resize', updateHeaderOffset);

        const dragThresholdPx = 6;
        const edgePaddingPx = 10;
        const snapDurationMs = 260;
        let pointerId = null;
        let startX = 0;
        let startY = 0;
        let startLeft = 0;
        let startTop = 0;
        let isDragging = false;
        let suppressClickUntil = 0;
        let snapTimer = null;

        function clearSnapTimer() {
            if (!snapTimer) return;
            window.clearTimeout(snapTimer);
            snapTimer = null;
        }

        function clamp(value, min, max) {
            return Math.min(Math.max(value, min), max);
        }

        function prepareForDrag() {
            const rect = fab.getBoundingClientRect();
            fab.style.left = `${rect.left}px`;
            fab.style.top = `${rect.top}px`;
            fab.style.right = 'auto';
            fab.style.bottom = 'auto';
        }

        function restoreCornerPositioning() {
            fab.style.left = '';
            fab.style.top = '';
            fab.style.right = '';
            fab.style.bottom = '';
        }

        function saveCorner(corner) {
            fab.dataset.corner = corner;
            try {
                window.localStorage.setItem(storageKey, corner);
            } catch (_) {
                // ignore
            }
        }

        function getNearestCorner(rect) {
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            const horizontal = centerX < window.innerWidth / 2 ? 'left' : 'right';
            const vertical = centerY < window.innerHeight / 2 ? 'top' : 'bottom';
            return `${vertical}-${horizontal}`;
        }

        function animateSnap(fromRect, corner) {
            saveCorner(corner);
            restoreCornerPositioning();

            const toRect = fab.getBoundingClientRect();
            const dx = fromRect.left - toRect.left;
            const dy = fromRect.top - toRect.top;

            fab.style.transform = `translate3d(${dx}px, ${dy}px, 0)`;
            fab.classList.remove('is-dragging');
            fab.classList.add('is-snapping');
            fab.getBoundingClientRect();

            window.requestAnimationFrame(function() {
                fab.style.transform = 'translate3d(0, 0, 0)';
            });

            const cleanup = function() {
                fab.classList.remove('is-snapping');
                fab.style.transform = '';
                clearSnapTimer();
            };

            fab.addEventListener('transitionend', cleanup, { once: true });
            snapTimer = window.setTimeout(cleanup, snapDurationMs + 80);
        }

        fab.addEventListener('pointerdown', function(event) {
            if (event.button !== undefined && event.button !== 0) return;

            pointerId = event.pointerId;
            try {
                fab.setPointerCapture(pointerId);
            } catch (_) {
                // ignore
            }

            const rect = fab.getBoundingClientRect();
            startX = event.clientX;
            startY = event.clientY;
            startLeft = rect.left;
            startTop = rect.top;
            isDragging = false;

            fab.classList.remove('is-snapping');
            fab.style.transform = '';
            clearSnapTimer();

            prepareForDrag();
        });

        fab.addEventListener('pointermove', function(event) {
            if (pointerId === null || event.pointerId !== pointerId) return;

            const dx = event.clientX - startX;
            const dy = event.clientY - startY;

            if (!isDragging) {
                if (Math.hypot(dx, dy) < dragThresholdPx) return;
                isDragging = true;
                fab.classList.add('is-dragging');
            }

            event.preventDefault();

            const size = fab.offsetWidth || 0;
            const maxLeft = Math.max(edgePaddingPx, window.innerWidth - size - edgePaddingPx);
            const maxTop = Math.max(edgePaddingPx, window.innerHeight - size - edgePaddingPx);

            const nextLeft = clamp(startLeft + dx, edgePaddingPx, maxLeft);
            const nextTop = clamp(startTop + dy, edgePaddingPx, maxTop);

            fab.style.left = `${nextLeft}px`;
            fab.style.top = `${nextTop}px`;
        }, { passive: false });

        function endDrag() {
            if (pointerId === null) return;

            try {
                fab.releasePointerCapture(pointerId);
            } catch (_) {
                // ignore
            }
            pointerId = null;

            if (!isDragging) {
                restoreCornerPositioning();
                return;
            }

            const fromRect = fab.getBoundingClientRect();
            const corner = getNearestCorner(fromRect);

            animateSnap(fromRect, corner);

            isDragging = false;
            suppressClickUntil = Date.now() + snapDurationMs;
        }

        fab.addEventListener('pointerup', endDrag);
        fab.addEventListener('pointercancel', endDrag);

        fab.addEventListener('click', function(event) {
            if (Date.now() < suppressClickUntil) {
                event.preventDefault();
                event.stopPropagation();
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWhatsAppFab);
    } else {
        initWhatsAppFab();
    }
})();
