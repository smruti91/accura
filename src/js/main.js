document.addEventListener('DOMContentLoaded', () => {
    // Scroll Animations using Intersection Observer
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animatedElements.forEach(el => observer.observe(el));

    // Navbar shrink on scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.padding = '0.5rem 0';
            navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
        } else {
            navbar.style.padding = '1rem 0';
            navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.05)';
        }
    });

    // Simple Form Validation Feedback (Contact & Login)
    // const forms = document.querySelectorAll('form');
    // forms.forEach(form => {
    //     form.addEventListener('submit', (e) => {
    //         e.preventDefault();
    //         // Basic simulation of a submit action
    //         const btn = form.querySelector('button[type="submit"]');
    //         const originalText = btn.innerHTML;
    //         btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
    //         btn.disabled = true;

    //         setTimeout(() => {
    //             btn.innerHTML = 'Success!';
    //             btn.classList.replace('btn-primary-custom', 'btn-success');
    //             setTimeout(() => {
    //                 btn.innerHTML = originalText;
    //                 btn.disabled = false;
    //                 btn.classList.replace('btn-success', 'btn-primary-custom');
    //                 form.reset();
    //             }, 2000);
    //         }, 1500);
    //     });
    // });
});
