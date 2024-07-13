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

$page_title = 'Akraba Sorgu';
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
                    Akraba Sorgu 
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
                                            <th style="color: white; font-weight: bold;">TC</th>
                                            <th style="color: white; font-weight: bold;">ADI</th>
                                            <th style="color: white; font-weight: bold;">SOYADI</th>
                                            <th style="color: white; font-weight: bold;">DOĞUM TARİHİ</th>
                                            <th style="color: white; font-weight: bold;">ADRES İL</th>
                                            <th style="color: white; font-weight: bold;">ADRES İLÇE</th>
                                            <th style="color: white; font-weight: bold;">ANNE ADI</th>
                                            <th style="color: white; font-weight: bold;">ANNE TC</th>
                                            <th style="color: white; font-weight: bold;">BABA ADI</th>
                                            <th style="color: white; font-weight: bold;">BABA TC</th>
                                            <th style="color: white; font-weight: bold;">UYRUK</th>
                                            <th style="color: white; font-weight: bold;">YAKINLIK</th>
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
                                                        "duration": 1800
                                                    });
                                                    $.ajax({
                                                    url: "../api/akraba/api.php",
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
                                                            '<td>' + value.TC + '</td>' +
                                                            '<td>' + value.ADI + '</td>' +
                                                            '<td>' + value.SOYADI + '</td>' +
                                                            '<td>' + value.DOGUMTARIHI + '</td>' +
                                                            '<td>' + value.NUFUSIL + '</td>' +
                                                            '<td>' + value.NUFUSILCE + '</td>' +
                                                            '<td>' + value.ANNEADI + '</td>' +
                                                            '<td>' + value.ANNETC + '</td>' +
                                                            '<td>' + value.BABAADI + '</td>' +
                                                            '<td>' + value.BABATC + '</td>' +
                                                            '<td>' + value.UYRUK + '</td>' +
                                                            '<td>' + value.Yakinlik + '</td>' +
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
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>