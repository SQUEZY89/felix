// =====================================================================
// ST MAKİNA — UZMANLIK ALANLARIMIZ / ÇÖZÜM KARTLARI
// "Çözüm Kartları" adlı kategoriden veri çekilip ana sayfada 4 kart
// olarak gösterilir. Description'a inject edilen meta tag'ler:
//   [LINK:url]    → tıklanma hedefi
//   [ICON:type]   → robot|weld|machine|auto|cube
//   [OFF]         → pasif (yoksa aktif)
//   [ORDER:N]     → sıralama (mevcut)
// HATA olursa section sessizce gizli kalır.
// =====================================================================
(function () {
    'use strict';
    if (typeof window.jQuery === 'undefined') return;
    var $ = window.jQuery;

    var SOLUTIONS_CATEGORY_NAME = 'çözüm kartları'; // case-insensitive
    var CACHE_KEY = 'hm_solutions_cache_v1';

    var META_REGEX_LINK  = /\[LINK:([^\]]+)\]/i;
    var META_REGEX_ICON  = /\[ICON:([a-z]+)\]/i;
    var META_REGEX_IMG   = /\[IMG:([^\]]+)\]/i;
    var META_REGEX_OFF   = /\[OFF\]/i;
    var META_REGEX_ORDER = /\[ORDER:(\d+)\]/i;

    var __cachedCategory = null;
    var __cachedItems    = [];

    // jQuery ready
    $(function () {
        // 1) Önce localStorage cache'den anlık render — kullanıcı beklemesin
        renderFromCache();
        // 2) Arka planda fresh data al, değiştiyse güncelle
        setTimeout(loadSolutions, 50);
    });

    // localStorage cache okuma (varsa anlık render)
    function renderFromCache() {
        try {
            var raw = localStorage.getItem(CACHE_KEY);
            if (!raw) return;
            var data = JSON.parse(raw);
            if (data && data.cat && Array.isArray(data.items) && data.items.length > 0) {
                __cachedCategory = data.cat;
                __cachedItems    = data.items;
                renderSection(data.cat, data.items);
            }
        } catch (e) {
            // localStorage corrupt veya parse hatası — yoksay
            try { localStorage.removeItem(CACHE_KEY); } catch (ex) {}
        }
    }

    // Cache'e yaz (sınır ihtiyatı: localStorage 5-10MB)
    function saveCache(cat, items) {
        try {
            var payload = JSON.stringify({ cat: cat, items: items, t: Date.now() });
            localStorage.setItem(CACHE_KEY, payload);
        } catch (e) {
            // Quota aşıldıysa cache'i temizle
            try { localStorage.removeItem(CACHE_KEY); } catch (ex) {}
        }
    }

    // Dil değişince mevcut cache'den yeniden render (DB'den çekme)
    document.addEventListener('hm-language-changed', function () {
        if (__cachedCategory) renderSection(__cachedCategory, __cachedItems);
    });

    function loadSolutions() {
        // GENEL SAFETY: 25 saniye içinde data gelmezse skeleton'ı temizle, section'ı gizle
        var safetyTimer = setTimeout(function () {
            var $grid = $('#hmSolutionsGrid');
            if ($grid.find('.hm-sol-skeleton').length > 0 && $grid.find('.hm-sol-card').length === 0) {
                console.warn('[Solutions] timeout — sunucudan veri gelmedi, section gizlendi');
                $('#hmSolutions').hide();
            }
        }, 25000);

        try {
            $.ajax({
                url: '/AdminData/GetCategories',
                method: 'GET',
                timeout: 8000,
                success: function (resp) {
                    var cats = (resp && resp.data) || [];
                    var solCat = findSolutionsCategory(cats);
                    if (!solCat) {
                        clearTimeout(safetyTimer);
                        $('#hmSolutions').hide();
                        return;
                    }
                    __cachedCategory = solCat;

                    $.ajax({
                        url: '/Product/GetCategoryProducts/' + encodeURIComponent(solCat.Id),
                        method: 'GET',
                        timeout: 22000,        // büyük base64 görseller için cömert timeout
                        success: function (pResp) {
                            clearTimeout(safetyTimer);
                            try {
                                var prods = (pResp && pResp.data) || [];
                                __cachedItems = parseAndSort(prods);
                                console.log('[Solutions] ' + __cachedItems.length + ' kart yüklendi');
                                renderSection(__cachedCategory, __cachedItems);
                                saveCache(__cachedCategory, __cachedItems);
                            } catch (parseErr) {
                                console.warn('[Solutions] parse hatası:', parseErr);
                                if ($('#hmSolutionsGrid .hm-sol-card').length === 0) {
                                    $('#hmSolutions').hide();
                                }
                            }
                        },
                        error: function (xhr, status) {
                            clearTimeout(safetyTimer);
                            console.warn('[Solutions] kartlar yüklenemedi:', status, xhr && xhr.status);
                            // Cache'den render edildiyse onu koru, yoksa section'ı gizle
                            if ($('#hmSolutionsGrid .hm-sol-card').length === 0) {
                                $('#hmSolutions').hide();
                            }
                        }
                    });
                },
                error: function () {
                    clearTimeout(safetyTimer);
                    if ($('#hmSolutionsGrid .hm-sol-card').length === 0) {
                        $('#hmSolutions').hide();
                    }
                }
            });
        } catch (e) {
            clearTimeout(safetyTimer);
            console.warn('[Solutions] yüklenemedi:', e);
            $('#hmSolutions').hide();
        }
    }

    function findSolutionsCategory(cats) {
        if (!cats || !cats.length) return null;
        for (var i = 0; i < cats.length; i++) {
            var n = (cats[i].Name || '').trim().toLowerCase();
            var en = (cats[i].EngName || '').trim().toLowerCase();
            if (n === SOLUTIONS_CATEGORY_NAME ||
                n === 'cozum kartlari' ||
                en === 'solution cards' ||
                en === 'solutions') {
                return cats[i];
            }
        }
        return null;
    }

    function parseMeta(desc) {
        if (!desc) return { link: '', icon: 'cube', active: true, order: null, img: '', clean: '' };
        var s = String(desc);
        var link  = (s.match(META_REGEX_LINK)  || [])[1] || '';
        var icon  = ((s.match(META_REGEX_ICON) || [])[1] || '').toLowerCase();
        var img   = (s.match(META_REGEX_IMG)   || [])[1] || '';
        var off   = META_REGEX_OFF.test(s);
        var order = (s.match(META_REGEX_ORDER) || [])[1];

        // Tüm meta tag'leri temizle
        s = s.replace(/\[LINK:[^\]]+\]/ig, '')
             .replace(/\[ICON:[a-z]+\]/ig, '')
             .replace(/\[IMG:[^\]]+\]/ig, '')
             .replace(/\[OFF\]/ig, '')
             .replace(/\[ORDER:\d+\]/ig, '')
             .replace(/\[HERO:\d+\]/ig, '')   // hero tag de varsa temizle
             .replace(/^\s*\n+/, '')
             .trim();

        return {
            link:   link.trim(),
            icon:   icon || null,
            img:    img.trim(),
            active: !off,
            order:  order !== undefined ? parseInt(order, 10) : null,
            clean:  s
        };
    }

    function parseAndSort(prods) {
        var arr = [];
        for (var i = 0; i < prods.length; i++) {
            var p = prods[i];
            var meta = parseMeta(p.Description);
            if (!meta.active) continue; // pasif kartlar gösterilmez
            // Görsel önceliği: manuel [IMG:url] > Product.Url
            var resolvedImg = (meta.img && meta.img.trim()) ? meta.img.trim() : (p.Url || '');
            arr.push({
                id:           p.Id,
                name:         stripMetaFromEng(p.Name || ''),
                engName:      stripMetaFromEng(p.EngName || ''),
                desc:         meta.clean,
                engDesc:      stripMetaFromEng(p.EngDescription),
                imgUrl:       resolvedImg,
                link:         meta.link,
                icon:         meta.icon || autoPickIcon(p.Name),
                order:        meta.order
            });
        }
        // Sırala: order varsa ona göre, yoksa sona
        arr.sort(function (a, b) {
            var ao = (a.order === null || a.order === undefined) ? 999999 : a.order;
            var bo = (b.order === null || b.order === undefined) ? 999999 : b.order;
            return ao - bo;
        });
        // Sınır yok — istenen kadar kart, 4'lü gridler halinde devam eder
        return arr;
    }

    function stripMetaFromEng(desc) {
        if (!desc) return '';
        return String(desc)
            .replace(/\[LINK:[^\]]+\]/ig, '')
            .replace(/\[ICON:[a-z]+\]/ig, '')
            .replace(/\[IMG:[^\]]+\]/ig, '')
            .replace(/\[OFF\]/ig, '')
            .replace(/\[ORDER:\d+\]/ig, '')
            .replace(/\[HERO:\d+\]/ig, '')
            .replace(/\[YT:[A-Za-z0-9_-]+\]/ig, '')
            .replace(/^\s*\n+/, '')
            .trim();
    }

    function autoPickIcon(name) {
        var n = (name || '').toLowerCase();
        if (n.indexOf('robot') !== -1) return 'robot';
        if (n.indexOf('kayna') !== -1 || n.indexOf('weld') !== -1) return 'weld';
        if (n.indexOf('makin') !== -1 || n.indexOf('machine') !== -1 || n.indexOf('mekanik') !== -1) return 'machine';
        if (n.indexOf('otomasyon') !== -1 || n.indexOf('plc') !== -1 || n.indexOf('automation') !== -1) return 'auto';
        return 'cube';
    }

    function iconClassFor(type) {
        switch ((type || '').toLowerCase()) {
            case 'robot':   return 'fa-robot';
            case 'weld':    return 'fa-fire-flame-curved';
            case 'machine': return 'fa-industry';
            case 'auto':    return 'fa-microchip';
            case 'gear':    return 'fa-gear';
            case 'cube':    return 'fa-cube';
            default:        return 'fa-cube';
        }
    }

    function escapeHtml(s) {
        if (s === null || s === undefined) return '';
        return String(s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }

    function renderSection(cat, items) {
        var $sec = $('#hmSolutions');
        if (!$sec.length) return;

        if (!items || items.length === 0) {
            $sec.hide();
            return;
        }

        var lang = (window.STMAKİNAI18n && window.STMAKİNAI18n.getLanguage)
                    ? window.STMAKİNAI18n.getLanguage() : 'tr';

        // Bölüm başlığı + alt açıklama (kategoriden) — tüm tag'ler temizlenir
        var title = (lang === 'en' && cat.EngName && String(cat.EngName).trim() && String(cat.EngName).trim() !== '-')
                    ? stripMetaFromEng(String(cat.EngName).trim())
                    : stripMetaFromEng(cat.Name || 'Uzmanlık Alanlarımız');
        var sub = '';
        if (lang === 'en' && cat.EngDescription && String(cat.EngDescription).trim()) {
            sub = stripMetaFromEng(String(cat.EngDescription).trim());
        } else if (cat.Description && String(cat.Description).trim()) {
            sub = stripMetaFromEng(String(cat.Description).trim());
        }

        $('#hmSolutionsTitle').text(title);
        $('#hmSolutionsSub').text(sub);

        // Kartları üret
        var html = '';
        for (var i = 0; i < items.length; i++) {
            var it = items[i];

            // Dil bazlı isim/açıklama
            var displayName = it.name;
            var displayDesc = it.desc;
            if (lang === 'en') {
                if (it.engName && it.engName.trim() && it.engName.trim() !== '-') displayName = it.engName.trim();
                if (it.engDesc && it.engDesc.trim()) displayDesc = it.engDesc.trim();
            }

            var iconCls = iconClassFor(it.icon);
            var href    = it.link && it.link.trim() ? it.link.trim() : '#';

            // Görsel/Video — Url uzantısına göre doğru tag kullan
            //   image (.jpg/.png/.webp/.gif) → <img>
            //   video (.mp4/.webm/.mov)       → <video autoplay muted loop>
            //   bilinmeyenler                 → <img> önce, onerror'da <video>
            var imgHtml = '';
            if (it.imgUrl && it.imgUrl.trim() && it.imgUrl.trim() !== '-') {
                var rawUrl = it.imgUrl.trim();
                var safeUrl = escapeHtml(rawUrl);
                var isVideo = /\.(mp4|webm|mov|m4v|ogv)(\?|$)/i.test(rawUrl);
                var isImage = /\.(jpe?g|png|webp|gif|svg|bmp|avif)(\?|$)/i.test(rawUrl);

                // İlk 4 kart eager load (hemen gözüksün), sonrakiler lazy
                var loadAttr = (i < 4) ? 'eager' : 'lazy';
                if (isVideo && !isImage) {
                    imgHtml = '<video src="' + safeUrl + '" autoplay muted loop playsinline preload="metadata" disableRemotePlayback></video>';
                } else if (isImage) {
                    imgHtml = '<img src="' + safeUrl + '" loading="' + loadAttr + '" decoding="async" alt="' + escapeHtml(displayName) + '" />';
                } else {
                    // Belirsiz — img dener, hata olursa video'ya fallback (JS ile)
                    imgHtml = '<img src="' + safeUrl + '" loading="' + loadAttr + '" decoding="async" alt="' + escapeHtml(displayName) + '" ' +
                              'onerror="(function(el){el.style.display=\'none\';' +
                              'var v=document.createElement(\'video\');' +
                              'v.src=el.src;v.autoplay=true;v.muted=true;v.loop=true;v.playsInline=true;' +
                              'v.setAttribute(\'preload\',\'metadata\');' +
                              'v.style.cssText=el.style.cssText;' +
                              'el.parentNode.appendChild(v);})(this)" />';
                }
            } else {
                imgHtml = '<div class="hm-sol-noimg"><i class="fa-solid ' + iconCls + '"></i></div>';
            }

            html +=
                '<a class="hm-sol-card fade-in-up" href="' + escapeHtml(href) + '">' +
                    '<div class="hm-sol-image">' + imgHtml + '</div>' +
                    '<div class="hm-sol-shade"></div>' +
                    '<div class="hm-sol-content">' +
                        '<span class="hm-sol-icon"><i class="fa-solid ' + iconCls + '"></i></span>' +
                        '<h3 class="hm-sol-title">' + escapeHtml(displayName) + '</h3>' +
                        (displayDesc ? '<p class="hm-sol-text">' + escapeHtml(displayDesc) + '</p>' : '') +
                        '<span class="hm-sol-arrow"><i class="fa-solid fa-arrow-right"></i></span>' +
                    '</div>' +
                '</a>';
        }

        // Kart sayısına göre grid layout adapte olsun
        var $grid = $('#hmSolutionsGrid');
        $grid.attr('data-count', items.length).html(html);
        $sec.show();

        // Fade-in observer (zaten genelde var, yine de tetikleyelim)
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                        io.unobserve(e.target);
                    }
                });
            }, { threshold: 0.12 });
            document.querySelectorAll('#hmSolutionsGrid .hm-sol-card.fade-in-up').forEach(function (el) {
                io.observe(el);
            });
        }
    }

    // Globals (admin tarafında da gerekebilir)
    window.STMAKİNASolutions = {
        SOLUTIONS_CATEGORY_NAME: SOLUTIONS_CATEGORY_NAME,
        parseMeta: parseMeta,
        iconClassFor: iconClassFor,
        autoPickIcon: autoPickIcon
    };
})();
