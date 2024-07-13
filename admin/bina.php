<?php

$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>'

);

$page_title = 'Bina Sorgu';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                    Bina Sorgu 
                    </h4>
                    <p style="color: #fff">Sorgulanacak kişinin TC kimlik numarasını giriniz.</p><br>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require maxlength="30" class="form-control" type="text" name="tc" id="tcx" placeholder="TC Giriniz"><br>
                        
                            

                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-search"></i> Sorgula </span></button>
                                <button onclick="clearResults()" id="durdurButon" class="btn waves-effect waves-light btn-rounded btn-danger btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-trash-alt"></i> Sıfırla </span></button>
                                <button onclick="printTable()" id="yazdirTable" class="btn waves-effect waves-light btn-rounded btn-warning btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-print"></i> Yazdır Detay </span></button><br><br>
                            </center>
                            <div class="table-responsive" id="scroll">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            
                                            <th style="color: white; font-weight: bold;">Kimlik No</th>
                                            <th style="color: white; font-weight: bold;">Ad</th>
                                            <th style="color: white; font-weight: bold;">Soyad</th>
                                            <th style="color: white; font-weight: bold;">Anne Adı</th>
                                            <th style="color: white; font-weight: bold;">Baba Adı</th>
                                            <th style="color: white; font-weight: bold;">Doğum Yeri</th>
                                            <th style="color: white; font-weight: bold;">Doğum Tarihi</th>
                                            <th style="color: white; font-weight: bold;">Cinsiyet</th>
                                            <th style="color: white; font-weight: bold;">Nüfus İl</th>
                                            <th style="color: white; font-weight: bold;">Nüfus İlçe</th>
                                            <th style="color: white; font-weight: bold;">Adres İl</th>
                                            <th style="color: white; font-weight: bold;">Adres İlçe</th>
                                            <th style="color: white; font-weight: bold;">Adres Mahalle</th>
                                            <th style="color: white; font-weight: bold;">Adres Cadde/Sokak</th>
                                            <th style="color: white; font-weight: bold;">Adres Bina No</th>
                                            <th style="color: white; font-weight: bold;">Adres Daire No</th>
                                        </tr>
                                    </thead>
                                    
                                <tbody id="jojjoojj" style="color: white;">
                              
                                </tbody>
                                </table>
                                 

<script type="text/javascript">
    function clearResults() {

        $("#jojjoojj").html(
            '<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">Sana her günümünnnnn ihtiyacııııı varrrrrrrr.</td></tr>'
        );

        $("#tc").val("");
    }
</script>
     <script>
                                            function checkNumber() {
                                                
                                        
                                                    $.Toast.showToast({
                                                        "title": "Sorgulanıyor...",
                                                        "icon": "loading",
                                                        "duration": 4000
                                                    });
                                                    $.ajax({
                                                    url: "../api/bina/api.php",
                                                    type: "POST",
                                                    data: {
                                                        tc: $("#tcx").val(),
														
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = JSON.parse(res);
                                                         
                                                            $('tbody').html("");
                                                    $.each(json, function(key, value) {
                                                        
                                                        $('tbody').append('<tr>' +
                                                            '<td>' + value.TC + '</td>' +
                                                            '<td>' + value.ADI + '</td>' +
                                                            '<td>' + value.SOYADI + '</td>' +
                                                            '<td>' + value.ANAADI + '</td>' +
                                                            '<td>' + value.BABAADI + '</td>' +
                                                            '<td>' + value.DOGUMYERI + '</td>' +
                                                            '<td>' + value.DOGUMTARIHI + '</td>' +
                                                            '<td>' + value.CINSIYETI + '</td>' +
                                                            '<td>' + value.NUFUSILI + '</td>' +
                                                            '<td>' + value.NUFUSILCESI + '</td>' +
                                                            '<td>' + value.ADRESIL + '</td>' +
                                                            '<td>' + value.ADRESILCE + '</td>' +
                                                            '<td>' + value.MAHALLE + '</td>' +
                                                            '<td>' + value.CADDE + '</td>' +
                                                            '<td>' + value.KAPINO + '</td>' +
                                                            '<td>' + value.DAIRENO + '</td>' +
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