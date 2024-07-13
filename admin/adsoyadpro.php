<?php
$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
'<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>',
    '<script src="../assets/plugins/jquery.toast/jquery.toast.js"></script>'

);

$page_title = '💎AD SOYAD TC💎';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

error_reporting(0);

?>
<style>
    body {
    background-image:url("");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                    💎AD SOYAD TC💎
                    </h4>
                    Sorgulanacak Kişinin Adı, Soyadı, Yaşadığı İli Giriniz.</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                                <input class="form-control" type="text" id="ad" placeholder="Ad"><br>
                                <input class="form-control" type="text" id="soyad" placeholder="Soyad"><br>
				                <input class="form-control" type="text" id="nufusil" placeholder="İl"><br>
				                <input class="form-control" type="text" id="nufusilce" placeholder="İlçe"><br>
                        </div>
                        <center class="nw">
                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearAll()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                            <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead> 
                                   <tr>
                                    <th style="color: white; font-weight: bold;">Kimlik No</th>
                                    <th style="color: white; font-weight: bold;">Adı</th>
                                    <th style="color: white; font-weight: bold;">Soyadı</th>
                                    <th style="color: white; font-weight: bold;">Doğum Tarihi</th>
                                    <th style="color: white; font-weight: bold;">Anne Adı</th>
                                    <th style="color: white; font-weight: bold;">Anne Tc</th>
                                    <th style="color: white; font-weight: bold;">Baba Adı</th>
                                    <th style="color: white; font-weight: bold;">Baba Tc</th>
                                    <th style="color: white; font-weight: bold;">Adres İl</th>
                                    <th style="color: white; font-weight: bold;">Adres İlçe</th>
                                    <th style="color: white; font-weight: bold;">Uyruk</th>
                                   </tr>
                                </thead>
                                <tbody id="jojjoojj" style="color: white;">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearResults() {
            $("#jojjoojj").html(' <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data available in table</td></tr>');
        }

        function clearValues() {
            document.getElementById("tc").value = "";
            document.getElementById("ad").value = "";
            document.getElementById("soyad").value = "";
            document.getElementById("nufusil").value = "";
	        document.getElementById("nufusilce").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var tc = $("#tc").val();
            var ad = $("#ad").val();
            var soyad = $("#soyad").val();
            var nufusil = $("#nufusil").val();
	        var nufusilce = $("#nufusilce").val();
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 86400000
            });
            $.ajax({
                url: "../api/adsoyadpro/api.php",
                type: "POST",
                data: {
                    tc: tc,
                    ad: ad,
                    soyad: soyad,
                    nufusil: nufusil,
		            nufusilce: nufusilce
                },
                success: (res) => {
                    var json = res;

                    $.Toast.hideToast();

                    if (json.message === "cooldown error") {
                        return Swal.fire({
                            icon: 'warning',
                            title: 'Ooooopss...',
                            text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                        })
                    }

                    if (json.success === "true") {
                        $.Toast.hideToast();

                        clearResults();
                        $("#jojjoojj").html("");
                        document.getElementById("sorgulanumber").innerHTML = "(" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
                            var tc = data.TC;
                            var name = data.ADI;
                            var surname = data.SOYADI;
                            var birthdate = data.DOGUMTARIHI;
                            var anneadi = data.ANNEADI;
                            var annetc = data.ANNETC;
                            var babaadi = data.BABAADI;
                            var babatc = data.BABATC;
                            var il = data.NUFUSIL;
                            var ilce = data.NUFUSILCE;
                            var uyruk = data.UYRUK;


                            result = "<tr>" +
                                "<th style=\"color: #fff;\">" +
                                tc +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                name +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                surname +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                birthdate +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                anneadi +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                annetc +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                babaadi +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                babatc +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                il +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                ilce +
                                "</th>" +
                                "<th style=\"color: #fff;\">" +
                                uyruk +
                                "</th>";

                            array.push(result);

                        }

                        $("#jojjoojj").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz bilgiler ile eşleşen bir kişi bulunamadı.',
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "Sunucu hatası!",
                        text: 'Lütfen yönetici ile iletişime geçin.'
                    })
                }
            })
        }
    </script>
    <style>
        body {
    background-image:url("https://cdn.wallpapersafari.com/10/24/NYrK4a.jpg");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
    </style>

<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>