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

$page_title = '💣SMS BOOMBER💣';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');


?>
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
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                    💣SMS BOOMBER💣
                    </h4>
                    <p style="color: #fff">SMS Spamlayacağınız kişinin numarasını girin.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require maxlength="10" class="form-control" type="text" name="gsm" id="gsm" placeholder="GSM Giriniz"><br>
                            <p style="color: #fff; font-size: 18px;">Telefon Numarasını başında "0" olmadan giriniz!</p><br>
                            <p style="color: #fff; font-size: 15px;"><b>Örnek: 5553723339</b></p>
                        
                            

                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-play"></i> Başlat </span></button>
                                <button onclick="clearResults()" id="durdurButon" class="btn waves-effect waves-light btn-rounded btn-danger btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-stop"></i> Durdur </span></button>
                                <button onclick="printTable()" id="yazdirTable" class="btn waves-effect waves-light btn-rounded btn-warning btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-print"></i> Yazdır Detay </span></button><br><br>
                            </center>
                            <div class="table-responsive" id="scroll">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            
                                            <th style="color: white; font-weight: bold;">DURUM</th>
                                            <th style="color: white; font-weight: bold;">TELEFON</th>
                                        </tr>
                                    </thead>
                                    
                                <tbody id="jojjoojj" style="color: white;">
                              
                                </tbody>
                                </table>
                                 

<script type="text/javascript">
    function clearResults() {

        $("#jojjoojj").html(
            '<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>'
        );

        $("#gsm").val("");
    }
</script>
     <script>
                                            function checkNumber() {
                /*return Swal.fire({
                    icon: "warning",
                    title: "Oooooopss...",
                    text: "Bu çözüm şu an bakımdadır!"
                });*/
                                                
                                        
                                                    $.Toast.showToast({
                                                        "title": "Gönderim Başlatıldı, sekme açık olduğu sürece SMS Bomber devam edecektir... Boomber işlemi bitmeden diğer sorguları kullanmazsınız!",
                                                        "icon": "loading",
                                                        "duration": 88000
                                                    });
                                                    $.ajax({
                                                    url: "../api/bomer/api.php",
                                                    type: "POST",
                                                    data: {
                                                        gsm: $("#gsm").val(),
														
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = JSON.parse(res);
                                                         
                                                            $('tbody').html("");
                                                    $.each(json, function(key, value) {
                                                        
                                                        $('tbody').append('<tr>' +
                                                            '<td>' + value.message + '</td>' +
                                                            '<td>' + value.phone + '</td>' +
                                                            '</tr>');
                                                    });
                                                        } else {
                                                            alert("Hata oluştu!");
                                                            return;
                                                        }
                                                    },
                                                    error: () => {
                                                        alert("Hata oluştu!");
                                                    }
                                                    
                                                });
                                            }
                                        
                                        </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #scroll{
    direction:ltr; 
    overflow:auto; 
    height:700px; 
    width:100%;
        
    }

#scroll div{
    direction:ltr;
}
</style> 
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>