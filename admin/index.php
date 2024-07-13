<?php
require '../server/baglan.php';
$customCSS = array(
  '<link rel="icon" href="https://i.hizliresim.com/tixo713.png" type="image/x-icon" />',
  '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
  '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
  '<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>',
  '<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>',
  '<script src="../assets/js/pages/dashboard.js"></script>'
);
$page_title = 'Panel';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

$query = "SELECT * FROM sh_kullanici";

if ($result = mysqli_query($conn, $query)) {
  $rowcount = mysqli_num_rows($result);
  $rowcount;
} else {
  $rowcount = "0";
}
?>

<!--BAŞLANGIC-->

<link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">

<div class="main-wrapper">
  <div class="row">
    <div class="col-md-4" style="width: 375px;">
      <div class="card stats-card">
        <div class="card-body" style="height: 116.2px !important;">
          <div class="stats-info">
          <div class="kurl" style="text-shadow: #6495ed 1px 1px 25px; background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);"><span style="color: #0ffacb; font-weight: 1000"><b>💎KULLANICILAR💎</b> </div><span class="stats-change stats-change-info"></span></h9>
            <h4 style="color: #ff0000;" class="stats-text"><?php echo $rowcount; ?></h4>
          </div>
          <div class="stats-icon change-danger">
            <i class="material-icons">account_circle</i>
          </div>
        </div>
      </div>
    </div>
  <div class="col-md-4" style="width: 375px;">
      <div class="card card-bg">
        <div class="card-body" style="height: 116.2px !important;">
          
          <table class="table">
            <tr>
              <th scope="col" style="color: #ff0000;
    font-weight: bolder;
    text-shadow: 0px 0px 10px #ff0000;"><b>✅ÜYELİK✅</b></th>
              <th scope="col" style="color: #ff0000;
    font-weight: bolder;
    text-shadow: 0px 0px 10px #ff0000;"><b>🚫BİTİŞ TARİHİ🚫</b></th>
            </tr>
            <tbody>
              <?php
              switch ($uyelik) {
                case 'Freemium':
                  echo '                                          <tr>
                                        <td>Freemuim</td>
                                        <td><span class="badge bg-success">Süresiz</span></td>
                                        </tr>';
                  break;
                case 'Premium':
                  echo '                                          <tr>
                                        <td><span class="de">Premium</span></td>
                                        <td><span class="badge bg-success" style="font-weight:bold;">' . $bitis_tarihi . '</span></td>
                                        </tr>';
                  break;
                case 'Admin':
                  echo '
                                        <td style="color:YELLOW;">🥀KURUCU🥀</td>
                                        <td><span class="de">🎲SÜRESİZ🎲</span></td>
                                        </tr>';
                  break;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4" style="width: 375px;">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
          <div class="kurl" style="text-shadow: #6495ed 1px 1px 25px; background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);"><span style="color: #d9ff00; font-weight: 500"><b>>>>💸💸PATRONN💸💸<<<</b> </div><span class="stats-change stats-change-info"></span></h9>
           <center> <h4 style="color: #ff0000" class="stats-text">💋 F E L İ X💋</h4></center>
          </div>
          <div class="stats-icon change-success">
            <i class="material-icons">manage_accounts</i>
          </div>
        </div>
      </div>
    </div>
    
  <div class="row">
    <div class="col-md-8" style="width: 98%;">
      <div class="card card-bg">
        <div class="card-body">
        <h9 class="card-title" id="se"><b>💎PATRON FELİX💎</b><span class="stats-change stats-change-info"></span></h9>
          <table class="table crypto-table">
            <tr>
            </div>  
           
            
              <th scope="col"> </th>
              <th scope="col"> </th>
              <div class="kurl" style="text-shadow: #6495ed 1px 1px 25px; background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);"><span style=" margin: 30px; float: left; color: #00fcca;  font-weight: 500"><b>DUYURU >>> 📢</b> </div>
              
          
              
            </tr>
            <tbody>
              <?php
              $query = mysqli_query($conn, "SELECT * FROM `sh_duyuru`");
              while ($getvar = mysqli_fetch_assoc($query)) {
                echo '
                                <tr>
                                  <td style="color: #fff"><img src="" alt="">' . $getvar['d_icerik'] . '</td>
                                  
                                  <td style="color: #fff"></td>
                                  <td style="color: #fff" class="text-danger"></td>
                                  <td style="color: #fff"><button type="button" class="btn btn-link">' . $getvar['d_time'] . '</button></td>
                                </tr>
								';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    
    <div class="row">
      <div class="col-md-12" style="width: 100%;">
        <div class="card card-bg">
          <div class="card-body">
            <h5 style="font-size: 26px" class="card-title"><span style="color: white; font-weight: 500">KURALLAR >❗</h5>
            <ul class="kural">
              <li class="kural" style="text-shadow: #6495ed 1px 1px 25px; background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif); color:#00ffe5;">Sorgu panelimizde <span style="color: #ff00d0; font-weight: 500"><b>MULTİ (ÇİFT HESAP) ÜYELİK KULLANIMI</b></span>
                kesinlikle yasaktır, kullanmanız durumunda sistem otomatik algılayıp hesabınızı silecektir.  ❗</li>
              <li class="kural" style="color: #00ff00;">Ünlülere ve Devlet yetkililerine sorgu atıldığı takdirde hesabınız otomatik olarak silinecektir.  ❗
              </li>
              <li class="kural" style="color: #ff00dd;">💎Ay Team💎 Panel üyeliğini farklı kişilere ucuz yoldan, komisyonculuğunu kovayalan kişiler tespit edilirse siteden Permanent Ban yiyecektir.  ❗
              </li>
              <li class="kural"style="color: #d4ff00;">Kendisini BussinesCheck Adminim & Yetkiliyim diye tanıtan şahıslara itibar etmeyin.  ❗
              </li>
            
              </li>
              <li class="kural"style="color: #ff1e00;">Satın alındıktan sonra iade kabul edilmez.  ❗</li>
               
               <li class="kural"style="color: #ff8c00;">Sitemizde ban atılan kişiler tekrar üyelik alabilir.  ❗</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.de {
     background-color: #1CC56E; /* Green */
  border: none;
  color: white;
  padding: 6px 18px;
  border-radius: 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
body {
    background-image:url("https://cdn.discordapp.com/attachments/1175776838354743425/1261444144409083944/anonymus_hacker_with_knife_dark_background_hd_hacker.jpg?ex=6692fae8&is=6691a968&hm=4b683f92324958fc98e8becb3dba46096ea51bf46fbfd604180fa2678a14fa87&");
    background-repeat:no-repeat;
    background-size:100%;
    background-position:center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
.card-body {
    box-shadow: 1px 0px 29px 0px rgba(255,16,240,0.73),
             3px 11px 29px -6px rgba(18,1,17,0.89);
  border-radius: 20px;
}

#se {
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: border-box,border-box,text;
    background-image: url(https://i.ibb.co/6RTDbVF/fire.gif),url(https://i.ibb.co/542CLcq/bg1.webp),linear-gradient(125deg, #aa771c 0%, #fff28a 26%, #f6c223 37%, #ffd778 49%, #eebb1d 61%, #aa771c 100%);
    background-size: 2em,3em,8em;
    animation: poseidon-anim 4s linear infinite;
}

</style>

<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?> 