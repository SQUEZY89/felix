<?php
$customCSS = array(
    '<link href="../assets/css/bootoast.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'

);
$customJAVA = array(
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>',
    '<script src="../assets/js/bootoast.min.js"></script>',
    '<script src="../assets/plugins/jquery.toast/jquery.toast.js"></script>',
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
);
$page_title = 'Üniversite Sorgu (NEW)';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');
?>
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Üniversite Sorgu</h4>
                    <p class="mb-1">
                    </p>
                    <p>Sorgulanacak Kişinin T.C. Nosunu Giriniz.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require="" maxlength="11" class="form-control" type="text" name="tc" id="tcno" placeholder="TC"><br>
                            <center class="nw">
                                <button onclick="checkNumber()" name="tc" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula </button>
                                <button onclick="clearResults()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                                <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                            </center>
                            <center>
                                <div class="col-xl-2 col-md-6">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 &nbsp;="" class="card-title mb-4"><i class="fas fa-camera"></i> Üniversite Logo</h4>
                                                <img id="KimlikFotograf" src="../upload/profile/olgali.gif" style="border-radius: 12px;" width="160" height="200" class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="table-responsive">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>    <th style="color: white;"><b>TC KİMLİK NO</b></th>
                                                <th style="color: white;"><b>ADI</b></th>
                                                <th style="color: white;"><b>SOYADI</b></th>
                                                <th style="color: white;"><b>OKUL NO</b></th>
                                                <th style="color: white;"><b>ÜNİVERSİTE ADI</b></th>
                                                <th style="color: white;"><b>ÜNİVERSİTE KURULUŞ YILI</b></th>
                                                <th style="color: white;"><b>ÜNİVERSİTE ADRESİ</b></th>
                                                <th style="color: white;"><b>ÜNİVERSİTE TELEFONU</b></th>
                                                <th style="color: white;"><b>KURUM TELEFONU</b></th>
                                                <th style="color: white;"><b>ÜNİVERSİTE MAİL</b></th>
                                                <th style="color: white;"><b>ÜNİVERSİTE WEB</b></th>
                                                <th style="color: white;"><b>FACEBOOK</b></th>
                                                <th style="color: white;"><b>TWİTTER</b></th>
                                                <th style="color: white;"><b>İNSTAGRAM</b></th>                                                
                                                <th style="color: white;"><b>AUTHOR</b></th>
                                        </tr>
                                    </thead>
                                    <tbody id="jojjoojj">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function clearResults() {
            $("#tcno").val("");
            $("#KimlikFotograf").attr("src", "../upload/profile/default.gif");
            $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
        }

        function checkNumber() {
            /*
            return Swal.fire({
                icon: "warning",
                title: "Oooooopss...",
                text: "Bu çözüm şu an bakımdadır!"
            });
            */

            var roleNumber = "<?= $k_rol ?>";

            if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {
              var tc = $("#tcno").val();
                $.Toast.showToast({
                    "title": "Sorgulanıyor...",
                    "icon": "loading",
                    "duration": 86400000
                });
                $.ajax({
                    url: "../api/universite/api.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        tc: $("#tcno").val()
                    },
                    beforeSend:function(){
                        $("#jojjoojj").html('');
                    },
                    success: (res) => {
                        var Response = res;

                        $.Toast.hideToast();

                        if (Response.message === "cooldown error") {
                            return Swal.fire({
                                icon: 'warning',
                                title: 'Ooooopss...',
                                text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + Response.remain + ' saniye bekleyin.',
                            })
                        }

                        if (Response.message === "no query remains") {
                            return Swal.fire({
                                icon: 'warning',
                                title: 'Ooooopss...',
                                text: 'Bu sorguyu kullanmak için hakkınız bulunmamaktadır.',
                            })
                        }

                        if (Response.success === false) {
                            $.Toast.hideToast();
                            Swal.fire({
                                icon: 'error',
                                title: 'Bulunamadı!',
                                text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                            })
                            return;
                        } else if (Response.success == true) {
                            $.Toast.hideToast();
                            $("#jojjoojj").append('<tr><td style="color: white;">' + Response.TC + '</td><td style="color: white;">' + Response.ADI + '</td><td style="color: white;">' + Response.SOYADI + '</td><td style="color: white;">' + Response.okulnumara + '</td><td style="color: white;">' + Response.ismi + '</td><td style="color: white;">' + Response.yıl +  '</td><td style="color: white;">' + Response.adres +  '</td><td style="color: white;">' + Response.OkulTelefon +  '</td><td style="color: white;">' + Response.KurumTelefon +  '</td><td style="color: white;">' + Response.mail +  '</td><td style="color: white;">' + Response.web +  '</td><td style="color: white;">' + Response.facebook +  '</td><td style="color: white;">' + Response.twitter +  '</td><td style="color: #fff;" id="fayujres"><b>root@quarex:~#</b></td></tr>');
                            $("#KimlikFotograf").attr("src", "data:image/jpeg;base64," + Response.logo);
                        } else {
                            $.Toast.hideToast();
                            Swal.fire({
                                icon: 'error',
                                title: 'Bulunamadı!',
                                text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                            })
                            return;
                        }
                    },
                    error: () => {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: "Sunucu hatası!",
                            text: 'Lütfen yönetici ile iletişime geçin.'
                        })
                        return;
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
                })
            }
        }
    </script>
</div>
<style>
#fayujres {
    background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);
}
</style>
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>