let isFirstLoad = true;
$(document).ready(function () {
    if (isFirstLoad) {

        serviceRequest();
        isFirstLoad = false;
        $("#loadingImg").attr("style", "display: none !important;");
        $(".body-none").attr("style", "display: block !important;");
    }
    window.addEventListener('pageshow', function (event) {
        var menuBoxw = document.getElementById('product-menu-box');
        menuBoxw.style.setProperty('display', 'none', 'important'); // Menüye display: none !important ekle
        if (isFirstLoad) {

            serviceRequest();
            isFirstLoad = false; 
            $("#loadingImg").attr("style", "display: none !important;");
            $(".body-none").attr("style", "display: block !important;");
        } else {
            serviceRequest();
            $("#loadingImg").attr("style", "display: none !important;");
            $(".body-none").attr("style", "display: block !important;");
        }
    });
});
function serviceRequest() {
    getAbout();
    toggleLoading(true);
}
function toggleLoading(show) {
    if (show) {
        $("#loadingImg").css("display", "block");
        $(".body-none").css("display", "none");
    } else {
        $("#loadingImg").css("display", "none");
        $(".body-none").css("display", "block");
    }
}

function getAbout() {
    $.ajax({
        url: "/HomeData/getAbout",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            if (data.data) {
                // EN modunda EngDescription öncelikli; yoksa about.intro çevirisini kullan
                var lang = (window.STMAKİNAI18n && window.STMAKİNAI18n.getLanguage)
                    ? window.STMAKİNAI18n.getLanguage() : 'tr';
                var rawText = data.data.Description || '';
                if (lang === 'en') {
                    var engDesc = data.data.EngDescription;
                    if (engDesc && String(engDesc).trim() && engDesc !== '-') {
                        rawText = engDesc;
                    } else if (window.STMAKİNAI18n && window.STMAKİNAI18n.t) {
                        // EN versiyonu DB'de yoksa about.intro varsayılan çevirisi
                        var fallback = window.STMAKİNAI18n.t('about.intro');
                        if (fallback && fallback !== 'about.intro') rawText = fallback;
                    }
                }
                var formattedText = String(rawText).replace(/\n/g, "<br>");
                $("#description").html(formattedText);
                $("#phone").text(data.data.PhoneOne || '');
                $("#phoneTwo").text(data.data.PhoneTwo || '');
                $("#adress").text(data.data.Adress || '');
            } else {
                sweetAlert("Oops...", "Kullanıcı bulunamadı!", "error");
            }
        },
        error: function (error) {
            sweetAlert("Oops...", "Bir Şeyler Ters Gitti !!", "error");
        },
        complete: function () {
            toggleLoading(false);
        }
    });
}

// Dil değiştiğinde About açıklamasını yeniden yükle
document.addEventListener('hm-language-changed', function () {
    if (document.getElementById('description')) {
        getAbout();
    }
});

