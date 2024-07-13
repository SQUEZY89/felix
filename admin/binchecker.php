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

$page_title = 'BIN Checker';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

error_reporting(0);

?>
<style>
    body {
    background-image:url("https://images.unsplash.com/photo-1537724326059-2ea20251b9c8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Y3JlZGl0JTIwY2FyZHxlbnwwfHwwfHw%3D&w=1000&q=80");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
<?php
  // Dimulai dengan POST Method
  if(isset($_POST['get'])){
  $script = $_POST['get'];
  $six = $_POST['enamdigit'];
  // Insert CURL
  function curl($url, $var = null) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_TIMEOUT, 25);
      if ($var != null) {
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
  // Enam digit Formula
  function defineNUM($bin) {
      return substr($bin,0,6);
  }
  // JSON DATA
    $bin = defineNUM($six);
    $curl = curl("https://lookup.binlist.net/".$bin); // Thanks to this API!
    $json = json_decode($curl);
    $brand = $json->scheme ? $json->scheme : "BIN Geçersiz!";
    $cardType = $json->type ? $json->type : "BIN Geçersiz!";
    $cardCategory = $json->bank ? $json->bank : "BIN Geçersiz!";
    $countryName = $json->country ? $json->country : "BIN Geçersiz!";
    $countryCode = $json->country ? $json->country : "BIN Geçersiz!";
   $details = '<p>BIN: '.$bin.'</br>Kart Türü: '.$brand.'</br>Banka Adı: '.$cardCategory->name.'</br>Banka URL: '.$cardCategory->url.'</br>Banka Telefon: '.$cardCategory->phone.'</br>Tip: '.$cardType.'</br>Ülke Adı: '.$countryName->name.'</br>Ülke Kodu: '.$countryCode->alpha2.'</br></br></p>';
	 
    
    if ($six == null) {
    die('error!');
}
    $binresult = $details;
}

	
?>

<div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h4 class="fs-base lh-base fw-medium text-muted mb-0">
 <i class="fas fa-credit-card"> BIN Checker</i>
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
<b style="color:white;">BIN Checker ile kart bilgilerinizi öğrenebilirsiniz.</b>
</h2>

</div>
</div>




  <div class="card">
                                        <div class="card-body">
								<form action="" method="post">																															
                             
                                    <div class="row">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Bin Numarası :</label>
                                                <input type="number" class="form-control" id="enamdigit" name="enamdigit" placeholder="Lütfen bir bin giriniz" maxlength="6" required></center>
                                            </div>
											<div class="card-header">
											<section id="bootstrap-toasts">
										<br>
					<center>
                   <button type="number" name="get" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button></form>
<button onclick="clearResults()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                                                    <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                </center>
                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
			  <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table"></div>
                                    <thead>
                                        <tr>
                                            <th>BIN</th>
<th>Kart Türü</th>
<th>Banka Adı</th>
<th>Banka URL</th>
<th>Banka Telefon</th>
<th>Kart Tipi</th>
<th>Ülke Adı</th>
<th>Ülke Kodu</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sex">
<td><?php echo $bin; ?> </td>

<td><?php echo $brand; ?> </td>

<td><?php echo $cardCategory->name; ?> </td>

<td><?php echo $cardCategory->url; ?> </td>

<td><?php echo $cardCategory->phone; ?> </td>

<td><?php echo $cardType; ?> </td>

<td><?php echo $countryName->name; ?> </td>

<td><?php echo $countryCode->alpha2; ?> </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
	    </div>
		    </div>
			    </div>
    <!-- END: Content-->

<script>
        function clearResults() {
            $("#sex").html(' <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><center>Tablo Sıfırlandı!</center></td></tr>');
        }

        function clearValues() {
            document.getElementById("#enamedigit").value = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }
</script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>



 <?php
    include('inc/footer_native.php');
    include('inc/footer_main.php');
    ?>