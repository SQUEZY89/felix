// =====================================================================
// HERO VIDEO PLAYLIST — opsiyonel, izole eklenti
// Ana sayfa zaten default video ile açıldıktan sonra çalışır.
// Tüm hata durumlarında sayfayı etkilemez (kendi kendine sessizce vazgeçer).
// Admin panelinde projelere [HERO:N] tag'i ekleyince sırayla bu videolar oynar.
// =====================================================================
(function () {
    'use strict';

    var HERO_REGEX = /\[HERO:(\d+)\]/i;
    var YT_REGEX   = /\[YT:([A-Za-z0-9_-]{6,20})\]/i;
    var __playlist  = [];
    var __idx       = 0;
    var __replaced  = false;  // default video ile değiştirildi mi
    var __waitForBannerTimer = null;

    // Tek video için YouTube embed URL'i — manuel rotasyon JS ile yapılır
    function buildYouTubeEmbedUrl(ids) {
        if (!ids || ids.length === 0) return '';
        var id = (typeof ids === 'string') ? ids : ids[0];
        // Tek videoyu loop yapmak için playlist=ID hilesi
        return 'https://www.youtube.com/embed/' + id +
            '?autoplay=1' +
            '&mute=1' +
            '&loop=1' +
            '&playlist=' + id +
            '&controls=0' +
            '&showinfo=0' +
            '&modestbranding=1' +
            '&rel=0' +
            '&playsinline=1' +
            '&iv_load_policy=3' +
            '&disablekb=1' +
            '&fs=0';
    }

    // ====== MANUEL ROTASYON SİSTEMİ ======
    // YouTube IFrame API güvensiz (origin/CORS sorunları). Bunun yerine her video
    // için iframe.src değiştirerek manuel ileri/geri yapıyoruz.
    var __ytIds = [];
    var __ytIdx = 0;
    var __ytTimer = null;
    var __ytAutoSwitchSec = 25;     // her 25 saniyede bir sonraki videoya geç

    function showHeroVideoAt(idx) {
        if (!__ytIds.length) return;
        if (idx < 0) idx = __ytIds.length - 1;
        if (idx >= __ytIds.length) idx = 0;
        __ytIdx = idx;
        var iframe = document.getElementById('bannerYtVideo');
        if (iframe) {
            iframe.src = buildYouTubeEmbedUrl(__ytIds[__ytIdx]);
        }
        // Aktif dot'u güncelle
        $('#heroNavDots .hero-dot').removeClass('active');
        $('#heroNavDots .hero-dot[data-i="' + __ytIdx + '"]').addClass('active');
        // Auto-switch timer'ı sıfırla
        restartAutoSwitch();
    }

    function restartAutoSwitch() {
        if (__ytTimer) {
            clearTimeout(__ytTimer);
            __ytTimer = null;
        }
        if (__ytIds.length < 2) return;
        __ytTimer = setTimeout(function () {
            showHeroVideoAt(__ytIdx + 1);
        }, __ytAutoSwitchSec * 1000);
    }

    // İleri/geri butonları ve dot indicator'u .box-banner'a ekle
    function mountManualNavControls(ids) {
        var $box = $('.box-banner');
        if (!$box.length) return;
        if ($box.find('.hero-nav-prev').length) return;     // zaten eklenmiş
        if (ids.length < 2) return;                         // tek video için butonlara gerek yok

        var prevBtn = '<button type="button" class="hero-nav-btn hero-nav-prev" aria-label="Önceki video">' +
                          '<i class="fa-solid fa-chevron-left"></i>' +
                      '</button>';
        var nextBtn = '<button type="button" class="hero-nav-btn hero-nav-next" aria-label="Sonraki video">' +
                          '<i class="fa-solid fa-chevron-right"></i>' +
                      '</button>';
        var dotsContainer = '<div class="hero-nav-dots" id="heroNavDots"></div>';

        $box.append(prevBtn).append(nextBtn).append(dotsContainer);

        // Dot'ları render et
        var $dots = $('#heroNavDots');
        var dotHtml = '';
        for (var i = 0; i < ids.length; i++) {
            dotHtml += '<button type="button" class="hero-dot' +
                        (i === 0 ? ' active' : '') +
                        '" data-i="' + i + '" aria-label="Video ' + (i + 1) + '"></button>';
        }
        $dots.html(dotHtml);

        // Click handler'lar — manuel iframe src değiştirme
        $box.find('.hero-nav-prev').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            showHeroVideoAt(__ytIdx - 1);
        });
        $box.find('.hero-nav-next').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            showHeroVideoAt(__ytIdx + 1);
        });
        $dots.on('click', '.hero-dot', function (e) {
            e.preventDefault();
            var idx = parseInt($(this).attr('data-i'), 10);
            showHeroVideoAt(idx);
        });
    }

    // iframe COVER yapmak için JS — parent boyutuna göre dinamik scale.
    // Çoklu tetikleme + ResizeObserver ile garantili çalışır.
    function setupYouTubeCover(wrapEl) {
        var iframe = wrapEl && wrapEl.querySelector('.hero-yt-iframe');
        if (!iframe) return;

        var resize = function () {
            // wrapEl boyutu yoksa box-banner'a fallback (parent referansı)
            var box = document.querySelector('.box-banner');
            var w = wrapEl.offsetWidth || (box && box.offsetWidth) || 0;
            var h = wrapEl.offsetHeight || (box && box.offsetHeight) || 0;
            if (!w || !h) return;
            var parentRatio = w / h;
            var videoRatio = 16 / 9;
            if (parentRatio > videoRatio) {
                // Parent geniş: iframe parent genişliğine eşit, height oranla (taşan kısım kesilir)
                iframe.style.width  = w + 'px';
                iframe.style.height = Math.ceil(w / videoRatio) + 'px';
            } else {
                // Parent kısa: iframe parent yüksekliğine eşit, width oranla
                iframe.style.height = h + 'px';
                iframe.style.width  = Math.ceil(h * videoRatio) + 'px';
            }
            // Override CSS varsayılanını
            iframe.style.maxWidth  = 'none';
            iframe.style.maxHeight = 'none';
        };

        // Birden fazla zamanda tetikle — iframe geç yüklenirse de yakala
        resize();
        setTimeout(resize, 50);
        setTimeout(resize, 250);
        setTimeout(resize, 800);
        setTimeout(resize, 1500);

        // iframe yüklenince
        iframe.addEventListener('load', resize);

        // Window resize
        window.addEventListener('resize', resize);

        // ResizeObserver — parent boyutu değişince otomatik yeniden hesapla (modern browserlar)
        if (typeof ResizeObserver !== 'undefined') {
            try {
                var ro = new ResizeObserver(resize);
                ro.observe(wrapEl);
                var box2 = document.querySelector('.box-banner');
                if (box2) ro.observe(box2);
            } catch (e) {}
        }

        // Orientation change (mobile portrait/landscape)
        window.addEventListener('orientationchange', function () {
            setTimeout(resize, 200);
        });
    }

    // jQuery yüklü değilse hiçbir şey yapma — sayfayı bozma
    if (typeof window.jQuery === 'undefined') return;
    var $ = window.jQuery;

    // Mobile'da pagination band'ı gizle (CSS'in yanı sıra JS güvencesi)
    var __isMobile = window.matchMedia && window.matchMedia('(max-width: 991.98px)').matches;
    if (__isMobile) {
        try {
            var sc = document.querySelector('.slider-card');
            if (sc) sc.style.display = 'none';
            var bd = document.getElementById('banner-data');
            if (bd) bd.style.display = 'none';
        } catch (e) {}
        // Not: mobile'da MP4 playlist hâlâ devre dışı (donma önlemi),
        // ama YouTube playlist mobile'da çalışır (YT CDN hızlıdır, donma yok)
        // Bu kontrol safeStart() içinde yapılır.
    }

    // Sayfa hazır olur olmaz başla — default video sistemi kaldırıldığı için bekleme yok
    $(function () {
        setTimeout(safeStart, 50);
    });

    function safeStart() {
        try {
            buildPlaylist(function (list) {
                // === DEBUG LOG — hangi ürünler hero'ya geliyor ===
                console.log('%c[HeroPlaylist] Toplanan hero ürünleri: ' + (list ? list.length : 0),
                    'background:#F44611;color:#fff;padding:2px 8px;border-radius:3px;');
                if (list) {
                    list.forEach(function (p, i) {
                        console.log('  ' + (i + 1) + '. ' + (p.name || '(adsız)') +
                                    ' | YT: ' + (p.ytId || 'YOK ❌') +
                                    ' | URL: ' + (p.url || 'yok'));
                    });
                }
                // === /DEBUG ===

                if (!list || list.length === 0) {
                    return;
                }

                if (__isMobile) {
                    var hasYt = list.some(function (p) { return p.ytId; });
                    if (!hasYt) {
                        return;
                    }
                }

                __playlist = list;
                __idx = 0;
                replaceVideoWithPlaylist();
            });
        } catch (e) {
            console.warn('[HeroPlaylist] sessizce vazgeçildi:', e && e.message);
        }
    }

    function buildPlaylist(callback) {
        var done = function (list) {
            try { callback(list || []); } catch (e) {}
        };

        $.ajax({
            url: '/AdminData/GetCategories',
            method: 'GET',
            timeout: 4000,
            success: function (catResp) {
                var cats = (catResp && catResp.data) || [];
                if (cats.length === 0) { done([]); return; }

                var pending = cats.length;
                var collected = [];
                var finalized = false;

                // Hard timeout 5 sn — bu süre içinde tamamlanmazsa mevcut listeyle devam et
                var hardTimeout = setTimeout(function () {
                    if (finalized) return;
                    finalized = true;
                    collected.sort(function (a, b) { return a.order - b.order; });
                    done(collected);
                }, 5000);

                cats.forEach(function (cat) {
                    $.ajax({
                        url: '/Product/GetCategoryProducts/' + encodeURIComponent(cat.Id),
                        method: 'GET',
                        timeout: 4000,
                        success: function (resp) {
                            try {
                                var prods = (resp && resp.data) || [];
                                prods.forEach(function (p) {
                                    if (!p) return;
                                    var desc = String(p.Description || '');
                                    var m = desc.match(HERO_REGEX);
                                    if (!m) return;  // hero seçilmemiş

                                    // YT ID öncelikli — varsa YouTube modu
                                    var ytMatch = desc.match(YT_REGEX);
                                    var ytId = ytMatch ? ytMatch[1] : '';

                                    // YT yoksa eski Url (MP4/WebM) — geri uyumluluk
                                    var url = (p.Url ? String(p.Url).trim() : '');
                                    if (url === '-') url = '';

                                    // Ne YT ne URL → atla (geçerli media yok)
                                    if (!ytId && !url) return;

                                    collected.push({
                                        url: url,
                                        ytId: ytId,
                                        order: parseInt(m[1], 10),
                                        name: p.Name || ''
                                    });
                                });
                            } catch (e) {}
                        },
                        complete: function () {
                            pending--;
                            if (pending === 0 && !finalized) {
                                finalized = true;
                                clearTimeout(hardTimeout);
                                collected.sort(function (a, b) { return a.order - b.order; });
                                done(collected);
                            }
                        }
                    });
                });
            },
            error: function () { done([]); }
        });
    }

    function replaceVideoWithPlaylist() {
        var $banner = $('#banner');
        if (!$banner.length) return;

        // YouTube ID'si olan ürünleri ayır
        var ytItems  = __playlist.filter(function (p) { return p.ytId; });
        var mp4Items = __playlist.filter(function (p) { return !p.ytId && p.url; });

        // Eğer hero ürünlerinde en az 1 YouTube var → YouTube playlist modu
        // (Mixed durumda YT öncelikli, MP4'ler atlanır — tutarlı playlist için)
        if (ytItems.length > 0) {
            var ytIds = ytItems.map(function (p) { return p.ytId; });
            renderYouTubePlaylist(ytIds);
            __replaced = true;
            return;
        }

        // YT yok → eski MP4 mantığı
        var currentVid = document.getElementById('bannerVideo');
        var firstUrl = __playlist[0] && String(__playlist[0].url || '').trim();
        var currentUrl = currentVid && currentVid.currentSrc ? currentVid.currentSrc.split('#')[0] : '';
        var sameAsDefault = false;
        if (firstUrl && currentUrl) {
            sameAsDefault = currentUrl.indexOf(firstUrl) !== -1 || firstUrl.indexOf(currentUrl.split('/').pop()) !== -1;
        }

        if (!sameAsDefault) {
            $banner.empty();
            __replaced = true;
            renderCurrent();
        } else {
            __replaced = true;
        }

        // Çoklu MP4 video varsa prev/next butonlarını ve dot indicator'u ekle
        if (__playlist.length > 1) {
            mountNavControls();
        }
    }

    // YouTube playlist — iframe'i .box-banner'a yerleştir, JS ile manuel rotasyon
    function renderYouTubePlaylist(ids) {
        var $box = $('.box-banner');
        if (!$box.length) return;
        if (!ids || !ids.length) return;

        // Global state'e kaydet (manuel nav ve auto-switch için)
        __ytIds = ids.slice();
        __ytIdx = 0;

        // .box-banner relative değilse zorla relative yap (iframe absolute için)
        if ($box.css('position') === 'static') {
            $box.css('position', 'relative');
        }

        // #banner default video container'ını GİZLE
        $('#banner').empty().css('display', 'none');

        // Eski yt-wrap varsa kaldır
        $box.find('#heroYtWrap').remove();

        // Inline style — CSS override imkânsız
        var wrapStyle =
            'position:absolute;top:0;left:0;right:0;bottom:0;' +
            'width:100%;height:100%;' +
            'overflow:hidden;background:#0A0A0A;' +
            'z-index:0;';

        var iframeStyle =
            'position:absolute;top:50%;left:50%;' +
            'transform:translate(-50%,-50%);' +
            'width:100%;height:100%;' +
            'border:0;pointer-events:none;display:block;';

        var blockerStyle =
            'position:absolute;top:0;left:0;right:0;bottom:0;' +
            'z-index:2;background:transparent;cursor:default;';

        // İlk video URL'i
        var embedUrl = buildYouTubeEmbedUrl(__ytIds[0]);

        var html =
            '<div class="hero-yt-wrap" id="heroYtWrap" style="' + wrapStyle + '">' +
                '<iframe id="bannerYtVideo" class="hero-yt-iframe" ' +
                    'src="' + embedUrl + '" ' +
                    'frameborder="0" ' +
                    'allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" ' +
                    'allowfullscreen ' +
                    'style="' + iframeStyle + '" ' +
                    'title="ST MAKİNA hero video">' +
                '</iframe>' +
                '<div class="hero-yt-blocker" aria-hidden="true" style="' + blockerStyle + '"></div>' +
            '</div>';

        $box.prepend(html);

        // hero-overlay ve hero-content üstte kalsın
        $box.find('.hero-overlay').css('z-index', '3');
        $box.find('.hero-content').css('z-index', '4');

        // COVER tekniği
        var wrap = document.getElementById('heroYtWrap');
        if (wrap) {
            setupYouTubeCover(wrap);
        }

        // Manuel ileri/geri butonları + dot indicator (sadece çoklu video için)
        if (__ytIds.length > 1) {
            mountManualNavControls(__ytIds);
            // Auto-switch başlat — 25sn'de bir sonraki video
            restartAutoSwitch();
        }
    }

    // Sol/sağ butonları ve alt dot'ları .box-banner içine ekle (video değişse de kalsın)
    function mountNavControls() {
        var $box = $('.box-banner');
        if (!$box.length) return;
        if ($box.find('.hero-nav-prev').length) return; // zaten eklenmiş

        var prevBtn = '<button type="button" class="hero-nav-btn hero-nav-prev" aria-label="Önceki video">' +
                          '<i class="fa-solid fa-chevron-left"></i>' +
                      '</button>';
        var nextBtn = '<button type="button" class="hero-nav-btn hero-nav-next" aria-label="Sonraki video">' +
                          '<i class="fa-solid fa-chevron-right"></i>' +
                      '</button>';
        var dots = '<div class="hero-nav-dots" id="heroNavDots"></div>';

        $box.append(prevBtn).append(nextBtn).append(dots);

        renderDots();

        $box.find('.hero-nav-prev').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            goTo(__idx - 1);
        });
        $box.find('.hero-nav-next').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            goTo(__idx + 1);
        });
    }

    function renderDots() {
        var $dots = $('#heroNavDots');
        if (!$dots.length) return;
        var html = '';
        for (var i = 0; i < __playlist.length; i++) {
            html += '<button type="button" class="hero-dot' +
                    (i === __idx ? ' active' : '') +
                    '" data-i="' + i + '" aria-label="Video ' + (i + 1) + '"></button>';
        }
        $dots.html(html);
        $dots.find('.hero-dot').off('click').on('click', function () {
            var i = parseInt($(this).attr('data-i'), 10);
            goTo(i);
        });
    }

    function goTo(newIdx) {
        if (!__playlist.length) return;
        // Wrap-around: -1 → son, length → 0
        if (newIdx < 0) newIdx = __playlist.length - 1;
        if (newIdx >= __playlist.length) newIdx = 0;
        if (newIdx === __idx) return;
        __idx = newIdx;
        renderCurrent();
        renderDots();
    }

    function renderCurrent() {
        var item = __playlist[__idx];
        if (!item) return;
        var $banner = $('#banner');
        if (!$banner.length) return;

        var url = String(item.url).replace(/"/g, '&quot;');
        var loopAttr = (__playlist.length === 1) ? 'loop' : '';

        // preload="metadata" — büyük dosyayı bütünüyle indirmek yerine sadece metadata
        // Stream halinde oynar, sayfa donmaz, gri ekran flash'ı yok
        var html =
            '<video class="img-fluid carousel-video" ' +
                'id="bannerVideo" ' +
                'src="' + url + '#t=0.5" ' +
                'preload="metadata" muted playsinline ' +
                'webkit-playsinline="true" x5-playsinline="true" ' +
                loopAttr + ' autoplay disableRemotePlayback>' +
            '</video>' +
            '<button type="button" class="banner-play-overlay" id="bannerPlayBtn" aria-label="Video oynat" style="display:none;">' +
                '<i class="fa-solid fa-play"></i>' +
            '</button>';

        $banner.empty().append(html);

        // Mevcut initBannerVideo (home.js'den) varsa onu çağır
        setTimeout(function () {
            try {
                if (typeof window.initBannerVideo === 'function') {
                    window.initBannerVideo();
                } else {
                    // Yedek: en azından oynatmayı dene
                    var v = document.getElementById('bannerVideo');
                    if (v) {
                        v.muted = true;
                        try { v.play(); } catch (e) {}
                    }
                }
            } catch (e) {}

            // Çoklu video → ended event ile sıradakine geç
            if (__playlist.length > 1) {
                var v = document.getElementById('bannerVideo');
                if (v) {
                    v.addEventListener('ended', function () {
                        __idx = (__idx + 1) % __playlist.length;
                        renderCurrent();
                    });
                }
            }
        }, 80);
    }
})();
