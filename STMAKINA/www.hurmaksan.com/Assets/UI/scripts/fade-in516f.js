// Genel scroll fade-in animasyonu (About, Contact ve diğer sayfalar için)
(function () {
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('.fade-in-up').forEach(function (el) {
            io.observe(el);
        });
    } else {
        document.querySelectorAll('.fade-in-up').forEach(function (el) {
            el.classList.add('visible');
        });
    }

    // Navbar scroll efekti (her sayfada)
    var navbar = document.getElementById('mainNavbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        });
    }

    // Yukarı çık butonu (her sayfada)
    var topBtn = document.getElementById('floatTopBtn');
    if (topBtn) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) topBtn.classList.add('visible');
            else topBtn.classList.remove('visible');
        });
        topBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
})();
