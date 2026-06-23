// =================================================================
// ST MAKİNA WhatsApp Akıllı Widget — defansif, retry'lı versiyon
// Floating buton tıklanınca chat-style mini pencere açılır,
// kullanıcı seçeneğe tıklayınca önceden yazılı mesajla WhatsApp'a gider.
// HER İHTİMALE KARŞI: DOM hazır olmasa bile retry yapar.
// =================================================================
(function () {
    'use strict';

    var WHATSAPP_PHONE   = '+905323563931';
    var STORAGE_BADGE_KEY = 'hm_wa_seen';
    var BOUND_FLAG        = '__waBound_v2';

    function init() {
        try {
            var widget   = document.getElementById('waWidget');
            var trigger  = document.getElementById('waTrigger');
            var panel    = document.getElementById('waPanel');
            var closeBtn = document.getElementById('waClose');
            var badge    = document.getElementById('waTriggerBadge');

            // DOM hazır değil mi? → 250ms sonra tekrar dene (max 20 deneme = 5sn)
            if (!widget || !trigger || !panel) {
                if (!init._tries) init._tries = 0;
                init._tries++;
                if (init._tries < 20) {
                    setTimeout(init, 250);
                }
                return;
            }

            // Çift bağlanmayı önle (script 2 kez yüklenirse)
            if (trigger[BOUND_FLAG]) return;
            trigger[BOUND_FLAG] = true;

            function openPanel() {
                widget.classList.add('opened');
                panel.setAttribute('aria-hidden', 'false');
                try { localStorage.setItem(STORAGE_BADGE_KEY, '1'); } catch (e) {}
                if (badge) badge.style.display = 'none';
            }
            function closePanel() {
                widget.classList.remove('opened');
                panel.setAttribute('aria-hidden', 'true');
            }
            function togglePanel() {
                if (widget.classList.contains('opened')) closePanel();
                else openPanel();
            }

            // ---- TRIGGER click (hem mouse hem touch) ----
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                togglePanel();
            });

            // ---- KAPAT butonu ----
            if (closeBtn) {
                closeBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    closePanel();
                });
            }

            // ---- ESC ile kapat ----
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && widget.classList.contains('opened')) {
                    closePanel();
                }
            });

            // ---- Dışarı tıklayınca kapat (mobilde değil — full screen) ----
            document.addEventListener('click', function (e) {
                if (!widget.classList.contains('opened')) return;
                if (window.innerWidth < 576) return;
                if (!widget.contains(e.target)) closePanel();
            });

            // ---- Seçenek tıklamaları → WhatsApp'a yönlendir ----
            var options = panel.querySelectorAll('.wa-option');
            for (var i = 0; i < options.length; i++) {
                (function (opt) {
                    opt.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var msg = opt.getAttribute('data-msg') || 'Merhaba, bilgi almak istiyorum.';
                        var url = 'https://api.whatsapp.com/send?phone=' + encodeURIComponent(WHATSAPP_PHONE)
                                + '&text=' + encodeURIComponent(msg);
                        try {
                            if (typeof gtag === 'function') {
                                gtag('event', 'whatsapp_lead', {
                                    event_category: 'engagement',
                                    event_label: msg.substring(0, 60)
                                });
                            }
                        } catch (ex) {}
                        try { window.open(url, '_blank', 'noopener'); } catch (ex) {
                            // Pop-up engelliyse aynı sayfada aç
                            window.location.href = url;
                        }
                        setTimeout(closePanel, 400);
                    });
                })(options[i]);
            }

            // ---- İlk açılışta bildirim rozeti — daha önce görmüş kullanıcı için gizle ----
            try {
                if (localStorage.getItem(STORAGE_BADGE_KEY) === '1') {
                    if (badge) badge.style.display = 'none';
                }
            } catch (e) {}

            // Başarı log'u — F12 console'da görünür
            try {
                console.log('%c[WA Widget] aktif', 'background:#25D366;color:#fff;padding:2px 8px;border-radius:3px;');
            } catch (e) {}

        } catch (err) {
            try { console.warn('[WA Widget] init hatası:', err); } catch (e) {}
        }
    }

    // DOM hazır mı?
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        // Zaten hazır → hemen çalış
        init();
    }
})();
