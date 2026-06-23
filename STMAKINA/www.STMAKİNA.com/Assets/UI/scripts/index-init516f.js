// ST MAKİNA ana sayfa scroll efektleri ve animasyonlar
(function () {
    // NAVBAR SCROLL EFEKTI
    var navbar = document.getElementById('mainNavbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        });
    }

    // YUKARI ÇIK BUTONU
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

    // FADE-IN ANIMATION
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

    // SAYAÇ ANIMASYONU
    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-count'), 10);
        var current = 0;
        var step = Math.max(1, Math.ceil(target / 60));
        var t = setInterval(function () {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(t);
            }
            el.textContent = current + '+';
        }, 25);
    }
    if ('IntersectionObserver' in window) {
        var statObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    animateCounter(e.target);
                    statObserver.unobserve(e.target);
                }
            });
        }, { threshold: 0.5 });
        document.querySelectorAll('.stat-number').forEach(function (el) {
            statObserver.observe(el);
        });
    }

    // SSS kart grid: akordeon yok, sürekli görünür (click handler gerekmez)
})();
