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

$page_title = 'Okul No (2023)';
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
                        Okul No Sorgu
                    </h4>
                    <p style="color: #fff">Sorgulanacak kişinin TC kimlik numarasını giriniz.</p><br>
                    <h1 style="font-family: impact; color: #fff; font-size:24px;">Peki bu sorgu ile ne yapabilirim diyorsanız;</h1><br>
                            <h1 style="font-family: impact; color: #fff; font-size:24px;">Okul Numarasını sorguladıktan sonra diğer kimlik bilgilerini de aldıktan sonra E-Okul sisteminden kişinin vesikasını öğrenebilirisiniz.</h1><br>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require maxlength="11" class="form-control" type="text" name="tc" id="tcx" placeholder="TC Giriniz"><br>
                            
                            

                            <center class="nw">
                                <button onclick="checkNumber()" name="tc" id="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
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
                                            <th style="color: white; font-weight: bold;">Okul No</th>
                                            <th style="color: white; font-weight: bold;">Adı</th>
                                            <th style="color: white; font-weight: bold;">Soyadı</th>
                                            <th style="color: white; font-weight: bold;">Eğitim Durumu</th>
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

        $("#tc").val("");
    }
</script>
<script>
                                            function checkNumber() {
                                                
                                        
                                                    $.Toast.showToast({
                                                        "title": "Bu işlem biraz uzun sürebilir lütfen biraz bekleyiniz...",
                                                        "icon": "loading",
                                                        "duration": 8000
                                                    });
                                                    $.ajax({
                                                    url: "../api/eokul/api.php",
                                                    type: "POST",
                                                    data: {
                                                        tc: $("#tcx").val(),
														
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = JSON.parse(res);
                                                         
                                                            $('tbody').html("");
                                                    $.each(json, function(key, value) {
                                                        var annenle_birdirbir = value.fayuj_tc;
                                                        var coderfayujx_ilkodufixed = value.fayuj_okulno;
                                                        var benbabamlakardesmiyim = value.fayuj_adi;
                                                        var kilicdarogluadayolmasin = value.fayuj_soyadi;
                                                        var sexmex = value.fayuj_sondurum;
                                                        
                                                         $('tbody').append('<tr>' +
                                                            '<td>' + annenle_birdirbir + '</td>' +
                                                            '<td>' + coderfayujx_ilkodufixed + '</td>' +
                                                            '<td>' + benbabamlakardesmiyim + '</td>' +
                                                            '<td>' + kilicdarogluadayolmasin + '</td>' +
                                                            '<td>' + sexmex + '</td>' +
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