const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
        return;
    }

    callback();
};

ready(() => {
    const header = document.querySelector('[data-site-header]');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const revealItems = document.querySelectorAll(
        '.section-shell, .hero-shell, .surface-panel, .metric-card, .info-card, .product-card, .solution-card, .timeline-card, .system-card, .client-carousel',
    );

    const syncHeader = () => {
        if (!header) {
            return;
        }

        header.classList.toggle('is-scrolled', window.scrollY > 12);
    };

    syncHeader();
    window.addEventListener('scroll', syncHeader, { passive: true });

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!isExpanded));
            mobileMenu.classList.toggle('hidden', isExpanded);
            document.body.classList.toggle('overflow-hidden', !isExpanded);
        });
    }

    document.querySelectorAll('[data-client-carousel]').forEach((carousel) => {
        const track = carousel.querySelector('[data-client-carousel-track]');
        const previousButton = carousel.querySelector('[data-client-carousel-prev]');
        const nextButton = carousel.querySelector('[data-client-carousel-next]');
        const dotsContainer = carousel.querySelector('[data-client-carousel-dots]');
        const slides = track ? Array.from(track.children) : [];
        let activeIndex = 0;
        let autoplayId = null;

        if (!track || !previousButton || !nextButton || !dotsContainer || slides.length === 0) {
            return;
        }

        const goToSlide = (index) => {
            activeIndex = (index + slides.length) % slides.length;
            updateCarousel();
        };

        const dots = slides.map((_, index) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'client-carousel__dot';
            dot.setAttribute('aria-label', `Ver depoimento ${index + 1}`);
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.append(dot);
            return dot;
        });

        const updateCarousel = () => {
            const activeSlide = slides[activeIndex];
            const viewportCenter = track.parentElement.clientWidth / 2;
            const slideCenter = activeSlide.offsetLeft + activeSlide.offsetWidth / 2;

            track.style.transform = `translateX(${viewportCenter - slideCenter}px)`;

            slides.forEach((slide, index) => {
                slide.classList.toggle('is-active', index === activeIndex);
            });
            dots.forEach((dot, index) => {
                dot.classList.toggle('is-active', index === activeIndex);
                dot.setAttribute('aria-current', index === activeIndex ? 'true' : 'false');
            });
        };

        const startAutoplay = () => {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                return;
            }

            autoplayId = window.setInterval(() => goToSlide(activeIndex + 1), 5200);
        };

        const stopAutoplay = () => {
            if (autoplayId) {
                window.clearInterval(autoplayId);
                autoplayId = null;
            }
        };

        previousButton.addEventListener('click', () => goToSlide(activeIndex - 1));
        nextButton.addEventListener('click', () => goToSlide(activeIndex + 1));

        carousel.addEventListener('mouseenter', stopAutoplay);
        carousel.addEventListener('mouseleave', startAutoplay);
        carousel.addEventListener('focusin', stopAutoplay);
        carousel.addEventListener('focusout', startAutoplay);

        window.addEventListener('resize', updateCarousel, { passive: true });
        updateCarousel();
        startAutoplay();
    });

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    revealItems.forEach((item, index) => {
        item.dataset.reveal = '';
        item.style.setProperty('--reveal-delay', `${Math.min(index % 6, 5) * 70}ms`);
    });

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        },
        {
            rootMargin: '0px 0px -10% 0px',
            threshold: 0.12,
        },
    );

    revealItems.forEach((item) => revealObserver.observe(item));
});
