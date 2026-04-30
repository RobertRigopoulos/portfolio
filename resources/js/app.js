

/**
 * Reveal-on-scroll animation.
 * Sections with class .reveal start invisible, fade in when scrolled into view.
 * Uses IntersectionObserver — performant, no scroll listeners.
 */
const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            io.unobserve(entry.target);
        }
    });
}, {
    rootMargin: '0px 0px -8% 0px',
    threshold: 0.05,
});

document.querySelectorAll('.reveal').forEach((el) => io.observe(el));
