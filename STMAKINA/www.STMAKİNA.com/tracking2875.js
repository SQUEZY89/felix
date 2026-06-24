// =====================================================================
// ST MAKİNA — Google Ads / GTM Conversion Tracking
// 6 Mayıs 2026 — Tüm sayfalarda otomatik click event yakalama
// =====================================================================
//
// Bu dosya dataLayer event'lerini ve gtag'i (varsa) tetikler.
// GTM container'ı _Layout.cshtml'de yüklenir, GTM ID'sini Tag Manager'dan al.
//
// Yakalanan event'ler:
//   1. whatsapp_click — WhatsApp link tıklaması
//   2. phone_click    — tel: link tıklaması
//   3. email_click    — mailto: link tıklaması
//   4. form_submit    — iletişim formu BAŞARILI gönderildiğinde
//                       (form gönderim handler'ından manuel tetiklenir:
//                        window.HmTracking.trackFormSuccess('contact_form'))
// =====================================================================

(function () {
    'use strict';

    // dataLayer hazır olsun
    window.dataLayer = window.dataLayer || [];

    // Google Ads Conversion mapping — her event için spesifik conversion ID + Label
    // Yeni dönüşüm oluşturulduğunda buraya ekle (Google Ads → Dönüşüm → Etiket Kurulumu'dan al)
    var GOOGLE_ADS_CONVERSIONS = {
        'whatsapp_click': {
            send_to: 'AW-18116899771/xk1zCP2YpqkcELvn575D',
            value: 50,
            currency: 'TRY'
        },
        'form_submit': {
            send_to: 'AW-18116899771/IjKYCP3F1qwcELvn575D',
            value: 100,
            currency: 'TRY'
        }
        // 'email_click' ve 'phone_click' GA4 üzerinden Google Ads'e import edildi.
        // Site burada generic 'event' olarak gönderiyor, Google Ads otomatik conversion sayar.
    };

    /**
     * Hem dataLayer'a (GTM için) hem gtag'e (Google Ads/GA4 için) event push eder.
     * Ayrıca event Google Ads conversion mapping'inde varsa conversion da tetikler.
     */
    function trackEvent(eventName, params) {
        if (!eventName) return;
        var data = { event: eventName };
        if (params && typeof params === 'object') {
            for (var k in params) {
                if (Object.prototype.hasOwnProperty.call(params, k)) {
                    data[k] = params[k];
                }
            }
        }
        try {
            window.dataLayer.push(data);
        } catch (e) {}

        // gtag varsa Google Ads/GA4 tarafına generic event gönder
        if (typeof window.gtag === 'function') {
            try {
                window.gtag('event', eventName, params || {});
            } catch (e) {}

            // Google Ads conversion eşlemesi varsa onu da tetikle
            if (GOOGLE_ADS_CONVERSIONS[eventName]) {
                try {
                    window.gtag('event', 'conversion', GOOGLE_ADS_CONVERSIONS[eventName]);
                } catch (e) {}
            }
        }
    }

    // ===== Global click listener — capture phase (link click'leri olur olmaz yakala) =====
    document.addEventListener('click', function (e) {
        var link = e.target && e.target.closest ? e.target.closest('a') : null;
        if (!link) return;
        var href = String(link.getAttribute('href') || '').toLowerCase().trim();
        if (!href) return;

        // WhatsApp (wa.me/, whatsapp.com, api.whatsapp.com)
        if (href.indexOf('wa.me/') !== -1 ||
            href.indexOf('whatsapp.com') !== -1 ||
            href.indexOf('api.whatsapp.com') !== -1) {
            trackEvent('whatsapp_click');
            return;
        }
        // Telefon
        if (href.indexOf('tel:') === 0) {
            trackEvent('phone_click');
            return;
        }
        // E-mail
        if (href.indexOf('mailto:') === 0) {
            trackEvent('email_click');
            return;
        }
    }, true); // capture phase

    // ===== Public API — form submit gibi manuel event'ler için =====
    window.HmTracking = {
        trackEvent: trackEvent,

        /**
         * İletişim formu BAŞARILI gönderildiğinde çağır.
         * Örn AJAX submit success callback'inde:
         *   window.HmTracking.trackFormSuccess('contact_form');
         */
        trackFormSuccess: function (formName) {
            trackEvent('form_submit', { form_name: formName || 'unknown' });
        }
    };

    // Diagnostic — console'da hazır olduğunu bildir
    try {
        console.log('%c[STMAKİNA] tracking.js v1 yüklendi (GTM/Ads events aktif)',
            'background:#34A853;color:#fff;padding:2px 8px;border-radius:3px;');
    } catch (e) {}
})();
