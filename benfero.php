<?php 
error_reporting(0);
class findchild{


public $tcm;
public $yak;
public function getchild($tc, $yak){
$mysqli = new mysqli("localhost","root","","101m");
$i = 0;
$sonuc = array();
$sorgux = $mysqli->query("select * from 101m where ANNETC='".$tc."' or BABATC='".$tc."'");
$check = mysqli_num_rows($sorgux);
if($check > 0){
foreach($sorgux as $sorgu){
	$tcsi = $sorgu['TC'];
	$hms2 = $mysqli->query("select * from 101m where ANNETC='".$tcsi."' or BABATC='".$tcsi."'");
	$kuzenlist = array();
	foreach($hms2 as $sili){
		$kcok = $sili['TC'];
		$hms2x = $mysqli->query("select * from 101m where ANNETC='".$kcok."' or BABATC='".$kcok."'");
	$kuzenlistx = array();
	foreach($hms2x as $gh2){
		$hafizxx = array("TC" => $gh2['TC'],
"AD" => $gh2['ADI'],
"SOYAD" => $gh2['SOYADI'],
"IL" => $gh2['NUFUSIL'],
"YAKINLIK" => "KUZENIN COCUGU");





array_push($kuzenlistx, $hafizxx);
	}
		$hafizx = array(
"TC" => $sili['TC'],
"AD" => $sili['ADI'],
"SOYAD" => $sili['SOYADI'],
"IL" => $sili['NUFUSIL'],
"COCUKLARI" => $kuzenlistx
);
array_push($kuzenlist, $hafizx);
	}
$hafiza = array(
"TC" => $sorgu['TC'],
"AD" => $sorgu['ADI'],
"SOYAD" => $sorgu['SOYADI'],
"YAKINLIK" => "$yak",
"KUZEN" => $kuzenlist,
"IL" => $sorgu['NUFUSIL']
);
array_push($sonuc, $hafiza);
}
}

return $sonuc;
}

public function getmother($tc, $islem){
$mysqli = new mysqli("localhost","root","","101m");

$sorgux = $mysqli->query("select * from 101m where TC='".$tc."'")->fetch_object();
if($islem == 'tc'){
$sonuc = $sorgux->ANNETC;
return $sonuc;
}else{
$sonuc = array();
$hafiza = array(
"TC" => "".$sorgux->ANNETC."",
"AD" => "".$sorgux->ANNEADI."",
"SOYAD" => "".$sorgux->SOYADI."",
"YAKINLIK" => "".$this->yak."",
"IL" => "".$sorgux->NUFUSIL.""
);
array_push($sonuc, $hafiza);
return $sonuc;
}

}

public function getfather($tc, $islem){
$mysqli = new mysqli("localhost","root","","101m");

$sorgux = $mysqli->query("select * from 101m where TC='".$tc."'")->fetch_object();
if($islem == 'tc'){
$sonuc = $sorgux->BABATC;
return $sonuc;
}else{
$sonuc = array();
$hafiza = array(
"TC" => "".$sorgux->BABATC."",
"AD" => "".$sorgux->BABAADI."",
"SOYAD" => "".$sorgux->SOYADI."",
"YAKINLIK" => "".$this->yak."",
"IL" => "".$sorgux->NUFUSIL.""
);
array_push($sonuc, $hafiza);
return $sonuc;
}
}


public function cocukmu($tc){
	$mysqli = new mysqli("localhost","root","","101m");
$ck = $mysqli->query("select * from 101m where BABATC='".$tc."' or ANNETC='".$tc."'");
$ck2 = mysqli_num_rows($ck);
return $ck2;
}

}