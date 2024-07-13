<?php
$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
'<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>',
    '<script src="../assets/plugins/jquery.toast/jquery.toast.js"></script>'

);

$page_title = '📂Kimlik Arşivi📂';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

$caliskan = 0;
error_reporting(0);
?>

<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">🌴Kimlik Arşivi Ay Team🌴</h4>
                    <p class="mb-1">
                    <p>
                    <h5 class="card-title mb-4">Uygun bulduğunuz kimlik görselini indirme basılı tutarak masa üstüne aktara bilir yada üstüne sağ tıklayarak indire bilirsiniz..✅🌴</h5>
                    <p class="mb-1">
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            
                           
                            <div class="table-responsive">
                                <div class="uzunluk">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/logo1.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex8.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex5.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex7.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex13.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex15.jpeg"style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex16.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex17.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex19.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex20.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex125.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex71.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex119.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex73.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex74.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex75.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex76.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex68.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex78.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex79.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex92.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex93.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex94.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/s1.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/s2.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/s3.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex118.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex110.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex96.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex89.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex90.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex56.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex34.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex42.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex24.jpeg" style="border-radius: 12px;" width="160" height="200" class="">
                                <img id="KimlikFotograf" src="/../stock/upload/profile/quarex59.jpeg" style="border-radius: 12px;" width="160" height="200" class="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<style>
    
.a {
    width: %20;
    font-family: impact;
    background-color: #83d8ae;
    border-color: #83d8ae;
    color: #fff;
    font-size:15px;
}


</style>
<style>
body {
    background-image: linear-gradient(to right, #0099f7, #f11712);
}

body {
    background-image:url("https://cdn.wallpapersafari.com/10/24/NYrK4a.jpg");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>


    </div>

    <!--BİTİŞ-->
    <?php
    include('inc/footer_native.php');
    include('inc/footer_main.php');
    ?>
