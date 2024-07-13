<?php
include_once "../server/rolecontrol.php";
$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link rel="icon" href="https://quarex.pro/assets/images/quarexlogox2.png" type="image/x-icon" />',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'US CC Checker';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');


?>
<style>
    body {
    background-image:url("https://wallpaperaccess.com/full/7850588.jpg");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
                <div class="row row-sm">
                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
										
										<h6 style="text-transform: none;" class="card-title">US CC CHECKER</h6>
										<br>
										<br>
                                        <h6 style="text-transform: none;" class="card-title">US Checklenecek Kartı Giriniz.</h6>
										
<br>
                                        <form>
                                            <div class="form-group">
                                                <input type="text" name="cc" class="form-control" id="cc" placeholder="4785002819186569|05|25|271">
                                                <br>
                                            </div>
                                            <center>
                                            <center><p style="color:white;" class="aciklama"><b>SPAM KORUMA:</b> Tek tek checkleyebilirsiniz.</p></center><br>
                                                <button style="padding: 10px 60px;" autocomplete="0" type="button" onclick="checkNumber()" class="btn btn-primary btn-icon-text">
                                                    <i class="btn-icon-prepend" data-feather="check-circle"></i>
                                                    Sorgula!
                                                </button>
                                                <button onclick="clearResults()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                                                    <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                            
                                             <div class="table-responsive" id="scroll">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            

                                            <th style="color: white; font-weight: bold;">KART</th>
                                            <th style="color: white; font-weight: bold;">Ülke</th>
                                            <th style="color: white; font-weight: bold;">Check</th>
                                        </tr>
                                    </thead>

                                    <tbody id="fayuj" style="color: white;">
                                    
                                    
                                    
                                    
                                    </tbody>
                                    </table>
                                        <script>
                                            function checkNumber() {
                                                 $.Toast.showToast({
                                                        "title": "Checkleniyor...",
                                                        "icon": "loading",
                                                        "duration": 6000
                                                    });
                                                $.ajax({
                                                    url: "../api/cc/api.php",
                                                    type: "POST",
                                                    data: {
                                                        cc: $("#cc").val(),
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = res;
                                                            $("#fayuj").html(json)
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
</div>
</div>

</div>
</div>
</div>
<script src="../vendors/popper/popper.min.js"></script>
<script src="../vendors/bootstrap/bootstrap.min.js"></script>
<script src="../vendors/anchorjs/anchor.min.js"></script>
<script src="../vendors/is/is.min.js"></script>
<script src="../vendors/echarts/echarts.min.js"></script>
<script src="../vendors/fontawesome/all.min.js"></script>
<script src="../vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="../vendors/list.js/list.min.js"></script>
<script src="../assets/js/theme.js"></script>

<style>
.aciklama {
    font-size: 20px;
    font-family: Verdana;
}
</style>
    </div>
    <!--BİTİŞ-->
    <?php
    include('inc/footer_native.php');
    include('inc/footer_main.php');
    ?>