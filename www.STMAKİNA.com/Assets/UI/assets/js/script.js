// Eski script.js — null-safe (id="menu" elementi mevcut değil, hata fırlatmasın)
(function () {
    var menuBtn = document.getElementById('menu-btn');
    var menu    = document.getElementById('menu'); // mevcut HTML'de yok, null olabilir
    if (!menuBtn) return;
    menuBtn.addEventListener('click', function () {
        if (menu && menu.classList) {
            menu.classList.toggle('menu-display-block');
        }
        // #menu yoksa, sessiz geç — site.js'deki gerçek hamburger akışı çalışmaya devam eder
    });
})();
