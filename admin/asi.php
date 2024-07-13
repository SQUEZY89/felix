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

$page_title = 'Aşı Sorgu 💉';
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
                    Aşı Sorgu 🩸
                    </h4>
                    <p style="color: #fff">Sorgulanacak kişinin TC kimlik numarasını giriniz.</p><br>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require maxlength="11" class="form-control" type="text" name="tc" id="tckn" placeholder="TC Giriniz"><br>
                        
                            

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
                                            
                                            <th style="color: white; font-weight: bold;">OİD</th>
                                            <th style="color: white; font-weight: bold;">AŞI</th>
                                            <th style="color: white; font-weight: bold;">HASTANE</th>
                                            <th style="color: white; font-weight: bold;">DOKTOR TC</th>
                                            <th style="color: white; font-weight: bold;">UYGULANMA TARİHİ</th>
                                            <th style="color: white; font-weight: bold;">UYGULANAN TC</th>
                                            <th style="color: white; font-weight: bold;">LOT NO</th>
                                            <th style="color: white; font-weight: bold;">STOK OİD</th>
                                            <th style="color: white;">Author</th>

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
                                                        "duration": 3500
                                                    });
                                                    $.ajax({
                                                    url: "../api/asi/api.php",
                                                    type: "POST",
                                                    data: {
                                                        tc: $("#tckn").val(),
														
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = JSON.parse(res);
                                                         
                                                            $('tbody').html("");
                                                    $.each(json, function(key, value) {
                                                        
                                                        $('tbody').append('<tr>' +
                                                            '<td>' + value.Oid + '</td>' +
                                                            '<td>' + value.UrunTanimi + '</td>' +
                                                            '<td>' + value.Birim + '</td>' +
                                                            '<td>' + value.HekimKimlikNo + '</td>' +
                                                            '<td>' + value.UygulamaTarihi + '</td>' +
                                                            '<td>' + value.UygulananKimlikNo + '</td>' +
                                                            '<td>' + value.LotNo + '</td>' +
                                                            '<td>' + value.StokOid + '</td>' +
                                                            '<td style="color: white;">root@janti:~#</td>' +
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
<!--BİTİŞ

<style>
.fayujtablo{
    color: #fff;
}
</style>
-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>