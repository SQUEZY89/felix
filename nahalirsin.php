<?php
$ip = $_SERVER['REMOTE_ADDR'];
//$izin = "::1";
$izin = "localhost";
$izinsatis = "localhost";



$izin = "127.0.0.1";
if($ip != $ip and $ip != $izinsatis){
echo "sg şurdan";
}else{
include("benfero.php");
$aha = new findchild();
$kurbanx = $_GET['tc'];
$kurban = htmlspecialchars($kurbanx);
$tcler = array();
$cocukkontrol = $aha->cocukmu($kurban);
if($cocukkontrol > 0){
$hm = $aha->getchild($kurban, 'ÇOCUĞU');
array_push($tcler, $hm);
$hm2 = $aha->getmother($kurban, "tc");
$hm3 = $aha->getchild($hm2, 'KARDES');
array_push($tcler, $hm3);
$hm4 = $aha->getfather($kurban, "tc");
$hm5 = $aha->getmother($hm4, "tc");
$aha->yak = "DEDESI";
$hmxn = $aha->getfather($hm4, "name");
$aha->yak = "KUZEN";
$hm6 = $aha->getchild($hm5, "AMCA / HALA");
array_push($tcler, $hm6);
array_push($tcler, $hmxn);
$hmx1 = $aha->getmother($hm5, "tc");

$hmok = $aha->getmother($hm2, "tc");
$hmok2 = $aha->getchild($hmok, "DAYI/TEYZE");
array_push($tcler, $hmok2);
$aha->yak = "BABASININ ANNESIN ANNESI";
$hmxn2 = $aha->getmother($hm5, "name");
$aha->yak = "KUZEN";
$hmx2 = $aha->getchild($hmxn2, "BabaAnnesinin Kardeşi");
array_push($tcler, $hmx2);
array_push($tcler, $hmxn2);
$yeni = json_encode($tcler, JSON_UNESCAPED_UNICODE);
print_r($yeni);
}else{
	$hm2 = $aha->getmother($kurban, "tc");
$hm3 = $aha->getchild($hm2, 'KARDES');
array_push($tcler, $hm3);
$hm3x = $aha->getchild($kurban, 'ÇOCUĞU');
array_push($tcler, $hm3x);

$hm4 = $aha->getfather($kurban, "tc");
$hm5 = $aha->getmother($hm4, "tc");
$aha->yak = "DEDESI";
$hmxn = $aha->getfather($hm4, "name");
$aha->yak = "KUZEN";
$hm6 = $aha->getchild($hm5, "AMCA / HALA");
array_push($tcler, $hm6);
array_push($tcler, $hmxn);
$hmx1 = $aha->getmother($hm5, "tc");
$aha->yak = "ANNEANNESİ";
$hmxn2 = $aha->getmother($hm5, "name");
$aha->yak = "KUZEN";
$hmx2 = $aha->getchild($hmx1, "DAYI / TEYZE");
array_push($tcler, $hmx2);
array_push($tcler, $hmxn2);
$yeni = json_encode($tcler, JSON_UNESCAPED_UNICODE);
print_r($yeni);
	
	
}
}


//eğer çocuksa
/*
0 da foreach size kardeşlerini verir eeğer kuzen faktöründe çocuk varsa bu yiğen demektir.
1de foreach size amca / hala verir eğer kuzen faktöründe çocuk varsa kuzen verir
2de 0  dedesini verir
3 de  dayı teyzeyi verir kuzen fakrtörü kzueni vrir.
4 de 0 annneanne siverir


*/