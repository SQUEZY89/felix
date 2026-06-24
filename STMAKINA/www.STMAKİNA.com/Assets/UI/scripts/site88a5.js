$(document).ready(function () {
    // Ürünler popup menüsü başlangıçta gizli
    var productMenuBox = document.getElementById('product-menu-box');
    if (productMenuBox) {
        productMenuBox.style.setProperty('display', 'none', 'important');
    }

    // Ürünler menüsünü aç/kapat
    var productMenuBtn = document.getElementById('product-menu-box-btn');
    if (productMenuBtn) {
        productMenuBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var menuBox = document.getElementById('product-menu-box');
            var navbar = document.getElementById('mainNavbar');

            // Dropdown'i navbar'in tam altina yerlestir
            if (navbar) {
                var navbarRect = navbar.getBoundingClientRect();
                menuBox.style.setProperty('top', navbarRect.bottom + 'px', 'important');
            }

            var isVisible = menuBox.style.display === 'block';
            if (isVisible) {
                menuBox.style.setProperty('display', 'none', 'important');
            } else {
                menuBox.style.setProperty('display', 'block', 'important');
            }
        });
    }

    // Dropdown disina tiklayinca kapatma
    document.addEventListener('click', function (e) {
        var menuBox = document.getElementById('product-menu-box');
        var menuBtn = document.getElementById('product-menu-box-btn');
        if (!menuBox || !menuBtn) return;
        if (menuBox.style.display === 'block' && !menuBox.contains(e.target) && e.target !== menuBtn) {
            menuBox.style.setProperty('display', 'none', 'important');
        }
    });

    // ESC tusu ile kapatma
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            var menuBox = document.getElementById('product-menu-box');
            if (menuBox && menuBox.style.display === 'block') {
                menuBox.style.setProperty('display', 'none', 'important');
            }
        }
    });

    // Mobil hamburger menüyü aç
    $("#menu-btn").click(function (e) {
        e.preventDefault();
        $("#menu-res").toggleClass("d-none");
    });

    // Mobil hamburger menüyü kapat (Düzeltme 1.C)
    $("#menu-close-btn").click(function (e) {
        e.preventDefault();
        $("#menu-res").addClass("d-none");
    });

    // Kategori menüsünü tüm sayfalar için yükle
    loadCategoryMenu();
});

// Kategori adına göre uygun Font Awesome ikonu seç
function pickCategoryIcon(name) {
    var n = (name || '').toLowerCase();
    if (n.indexOf('robot') !== -1) return 'fa-robot';
    if (n.indexOf('makin') !== -1 || n.indexOf('mekanik') !== -1) return 'fa-industry';
    if (n.indexOf('otomasyon') !== -1 || n.indexOf('plc') !== -1) return 'fa-microchip';
    if (n.indexOf('kayna') !== -1) return 'fa-fire-flame-curved';
    if (n.indexOf('pres') !== -1) return 'fa-compress';
    return 'fa-cube';
}

// Sözlük yedeği için i18n key (EngName boşsa kullanılır)
function pickCategoryI18nKey(catName) {
    if (!catName) return null;
    var n = catName.toLowerCase();
    if (n.indexOf('robot') !== -1) return 'urun.catname.robot';
    if (n.indexOf('makin') !== -1 || n.indexOf('mekanik') !== -1) return 'urun.catname.machine';
    if (n.indexOf('otomasyon') !== -1 || n.indexOf('plc') !== -1) return 'urun.catname.automation';
    return null;
}

var __cachedMenuCategories = null;

// "Çözüm Kartları" / yedek kategoriler — frontend listelerinden gizle
function isHiddenCategory(cat) {
    if (!cat) return true;
    var n  = String(cat.Name || '').trim().toLowerCase();
    var en = String(cat.EngName || '').trim().toLowerCase();
    if (n === 'çözüm kartları' || n === 'cozum kartlari') return true;
    if (en === 'solution cards' || en === 'solutions') return true;
    // Yedek kategoriler — _BACKUP_ ile başlayan veya backup içeren her şey
    if (n.indexOf('_backup_') === 0) return true;
    if (n.indexOf('backup') !== -1 && n.indexOf('cozum') !== -1) return true;
    if (en.indexOf('_backup_') === 0) return true;
    if (en.indexOf('backup') !== -1 && en.indexOf('solution') !== -1) return true;
    return false;
}

function loadCategoryMenu() {
    $.ajax({
        url: '/AdminData/GetCategories',
        method: 'GET',
        success: function (data) {
            if (!data || !data.data) return;
            // Solutions / Çözüm Kartları kategorisini frontend listesinden ayır
            var visible = data.data.filter(function (c) { return !isHiddenCategory(c); });
            __cachedMenuCategories = visible;
            renderCategoryMenu(visible);
        },
        error: function (err) {
            console.error('Kategori menüsü yüklenemedi:', err);
        }
    });
}

function renderCategoryMenu(cats) {
    if (!cats) return;

    var lang = (window.STMAKİNAI18n && window.STMAKİNAI18n.getLanguage)
                ? window.STMAKİNAI18n.getLanguage() : 'tr';

    // Aktif kategori — URL'de ?id=... varsa o vurgulansın
    var urlParams = new URLSearchParams(window.location.search);
    var activeId = urlParams.get('id');

    var menuHtml = '';
    for (var i = 0; i < cats.length; i++) {
        var cat = cats[i];
        var trName = cat.Name || 'Kategori';
        var icon = pickCategoryIcon(trName);
        var nameKey = pickCategoryI18nKey(trName);
        var isActive = activeId && String(activeId) === String(cat.Id);
        var activeClass = isActive ? ' is-active' : '';

        // Display name + i18n attribute mantığı:
        // EN modu + DB'de EngName var → EngName göster, data-i18n KOYMA (üstüne yazılmasın)
        // EN modu + EngName yok → sözlük key'i ile çevir
        // TR modu → DB'deki TR ad, sözlük key'i yedek olarak ekle
        var displayName = trName;
        var titleAttr = '';
        if (lang === 'en') {
            if (cat.EngName && String(cat.EngName).trim() && String(cat.EngName).trim() !== '-') {
                displayName = String(cat.EngName).trim();
            } else if (nameKey) {
                titleAttr = ' data-i18n="' + nameKey + '"';
            }
        } else {
            if (nameKey) titleAttr = ' data-i18n="' + nameKey + '"';
        }

        menuHtml +=
            '<div class="product-category-item">' +
                '<a href="/Home/CategoryDetail?id=' + encodeURIComponent(cat.Id) + '" ' +
                   'class="product-menu-other-title' + activeClass + '">' +
                    '<span class="pmo-icon"><i class="fa-solid ' + icon + '"></i></span>' +
                    '<span class="pmo-text">' +
                        '<span class="pmo-title"' + titleAttr + '>' + displayName + '</span>' +
                        '<span class="pmo-sub" data-i18n="urun.kart.btn">Projeleri Gör</span>' +
                    '</span>' +
                    '<span class="pmo-arrow"><i class="fa-solid fa-arrow-right"></i></span>' +
                '</a>' +
            '</div>';
    }
    $("#menu-res-categories").html(menuHtml);

    // i18n'i hemen uygula (data-i18n'li yeni elementler çevrilsin)
    if (window.STMAKİNAI18n && window.STMAKİNAI18n.apply) {
        window.STMAKİNAI18n.apply();
    }
}

// Dil değişince kategori menüsünü yeniden render et (DB'den tekrar çekme — cache var)
document.addEventListener('hm-language-changed', function () {
    if (__cachedMenuCategories) {
        renderCategoryMenu(__cachedMenuCategories);
    }
});

// Video lazy-load (data-src kullanan videolar için)
document.addEventListener("DOMContentLoaded", function () {
    if (!('IntersectionObserver' in window)) return;
    document.querySelectorAll("video[data-src]").forEach(function (video) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    if (!video.src) {
                        video.src = video.dataset.src;
                        video.load();
                    }
                    observer.unobserve(video);
                }
            });
        });
        observer.observe(video);
    });
});