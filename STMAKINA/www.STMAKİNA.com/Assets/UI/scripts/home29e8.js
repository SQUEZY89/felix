var serviceCalled = false;

$(document).ready(function () {
    if (!serviceCalled) {
        serviceCalled = true;
        serviceRequest();
    }

    var menuBoxw = document.getElementById('product-menu-box');
    if (menuBoxw) menuBoxw.style.setProperty('display', 'none', 'important');
});

function showBody() {
    $("#loadingImg").attr("style", "display: none !important;");
    $(".body-none").attr("style", "display: block !important;");
}

function serviceRequest() {
    // Default video — sayfayı her zaman bu yükler, hiçbir şey bekletmez
    getAbout(function () { showBody(); });

    // Güvenlik ağı: 3 saniye içinde her ne olursa olsun sayfayı göster
    setTimeout(showBody, 3000);
}

// Default video — YouTube URL desteği
function isYouTubeUrl(url) {
    return /(?:youtube\.com|youtu\.be)/i.test(url || '');
}
function extractYouTubeIdFromUrl(url) {
    if (!url) return '';
    var m = String(url).match(/(?:v=|youtu\.be\/|embed\/|shorts\/)([A-Za-z0-9_-]{11})/);
    return m ? m[1] : '';
}
function buildHomeYtEmbedUrl(id) {
    return 'https://www.youtube.com/embed/' + id +
        '?autoplay=1&mute=1&loop=1&playlist=' + id +
        '&controls=0&showinfo=0&modestbranding=1' +
        '&rel=0&playsinline=1&iv_load_policy=3&disablekb=1&fs=0';
}
function setupHomeYtCover(wrapEl) {
    if (!wrapEl) return;
    var iframe = wrapEl.querySelector('.hero-yt-iframe');
    if (!iframe) return;
    function resize() {
        var box = document.querySelector('.box-banner');
        var w = wrapEl.offsetWidth || (box && box.offsetWidth) || 0;
        var h = wrapEl.offsetHeight || (box && box.offsetHeight) || 0;
        if (!w || !h) return;
        var pr = w / h, vr = 16 / 9;
        if (pr > vr) {
            iframe.style.width = w + 'px';
            iframe.style.height = Math.ceil(w / vr) + 'px';
        } else {
            iframe.style.height = h + 'px';
            iframe.style.width = Math.ceil(h * vr) + 'px';
        }
        iframe.style.maxWidth = 'none';
        iframe.style.maxHeight = 'none';
    }
    resize();
    [50, 250, 800, 1500].forEach(function (ms) { setTimeout(resize, ms); });
    iframe.addEventListener('load', resize);
    window.addEventListener('resize', resize);
    if (typeof ResizeObserver !== 'undefined') {
        try {
            var ro = new ResizeObserver(resize);
            ro.observe(wrapEl);
            var box2 = document.querySelector('.box-banner');
            if (box2) ro.observe(box2);
        } catch (e) {}
    }
}

function getAbout(done) {
    // Default video sistemi KALDIRILDI (3 Mayıs/6 Mayıs 2026).
    // Hero alanı artık SADECE Admin → "Hero Video Yöneticisi" sekmesinden seçilen
    // ürünlerin YouTube videolarını oynatır. hero-playlist.js bu ürünleri çekip
    // banner'a iframe olarak yerleştirir.
    // Bu fonksiyon sadece "loading" hissi vermek için banner'ı temizler ve done() çağırır.
    $('#banner').empty();
    if (typeof done === 'function') done();
}

function initBannerVideo() {
    var v = document.getElementById('bannerVideo');
    var btn = document.getElementById('bannerPlayBtn');
    if (!v || !btn) return;

    // Garanti muted (iOS autoplay icin sart)
    v.muted = true;
    v.defaultMuted = true;
    v.setAttribute('muted', '');

    function showOverlay() { btn.style.display = 'flex'; }
    function hideOverlay() { btn.style.display = 'none'; }

    function tryPlay() {
        try {
            var p = v.play();
            if (p && typeof p.then === 'function') {
                p.then(function () {
                    hideOverlay();
                }).catch(function (err) {
                    console.log('[Banner] Otomatik oynatma reddedildi:', err && err.message);
                    showOverlay();
                });
            } else {
                hideOverlay();
            }
        } catch (e) {
            console.warn('[Banner] play() hata:', e);
            showOverlay();
        }
    }

    // Buton tiklamasi
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        v.muted = true; // garanti
        var p = v.play();
        if (p && typeof p.then === 'function') {
            p.then(function () {
                hideOverlay();
                // Tikladiktan ~500ms sonra unmute (kullanici user-gesture verdi)
                setTimeout(function () {
                    try { v.muted = false; v.removeAttribute('muted'); } catch (ex) {}
                }, 400);
            }).catch(function (err) {
                console.warn('[Banner] manuel play reddedildi:', err);
            });
        } else {
            hideOverlay();
        }
    });

    // Hata yakalama
    v.addEventListener('error', function () {
        console.warn('[Banner] video error', v.error);
        showOverlay();
    });

    // Stalled / ilerleme yoksa overlay göster (8 sn)
    var startTime = Date.now();
    var stallCheck = setInterval(function () {
        if (!v.paused) { clearInterval(stallCheck); return; }
        if (Date.now() - startTime > 8000) {
            clearInterval(stallCheck);
            if (v.paused) showOverlay();
        }
    }, 1500);

    // Play olunca overlay gizle
    v.addEventListener('playing', hideOverlay);
    v.addEventListener('pause', function () {
        // Sadece kullanici tarafindan duraklatildiysa overlay gosterme
    });

    // Ilk denemeleri yap
    if (v.readyState >= 2) {
        tryPlay();
    } else {
        v.addEventListener('loadeddata', tryPlay, { once: true });
        v.addEventListener('canplay', tryPlay, { once: true });
        // 2 sn sonra metadata gelmediyse de dene
        setTimeout(tryPlay, 2000);
    }

    // Sayfa goruntulendiginde tekrar dene (geri donduyse)
    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'visible' && v.paused) {
            tryPlay();
        }
    });
}

function getCategories(done) {
    $('#categories').empty();
    $('#banner-data').empty();

    $.ajax({
        url: "/AdminData/GetCategories",
        method: 'GET',
        success: function (data) {
            if (!data || !data.data) {
                if (typeof done === 'function') done();
                return;
            }

            var categoriesHtml = "";
            for (var i = 0; i < data.data.length; i++) {
                var item = data.data[i];
                var nameParts = item.Name ? item.Name.split(" ") : [""];
                var firstWord = nameParts[0] || "";
                var remainingWords = nameParts.slice(1).join(" ") || "";
                var formattedDescription = item.Description ? item.Description.replace(/\n/g, "<br>") : "";

                categoriesHtml +=
                    '<div class="home-show-room mx-auto my-4">' +
                        '<h1 class="home-show-room-title"><span>' + firstWord + '</span>' + remainingWords + '</h1>' +
                        '<video class="img-fluid show-video mx-auto" src="' + item.Url + '#t=0.5" preload="metadata" muted playsinline loop controls></video>' +
                        '<p class="home-show-room-text mt-4 mb-5">' + formattedDescription + '</p>' +
                        '<div class="row">' +
                            '<a href="/Home/CategoryDetail?id=' + encodeURIComponent(item.Id) + '" class="home-show-room-product-btn">Daha Fazla</a>' +
                        '</div>' +
                    '</div>';
            }
            $("#categories").append(categoriesHtml);
            if (typeof done === 'function') done();
        },
        error: function (error) {
            console.error('getCategories hatası:', error);
            if (typeof done === 'function') done();
        }
    });
}
