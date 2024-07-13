<?php
/* api */
error_reporting(0);
$auth_key = "jantiapiservices";
if($_GET['auth'] != $auth_key) {
    echo json_encode(array('success' => false, 'message' => 'auth key nerde amcik herif'));
    die();
} else {

$tc = htmlspecialchars($_GET['tc']); 

$url = "https://ajexapi.online/api/okul?auth=barisyesari31@&tc=$tc";

$fayuj = curl_init($url);
curl_setopt($fayuj, CURLOPT_URL, $url);
curl_setopt($fayuj, CURLOPT_RETURNTRANSFER, true);
curl_setopt($fayuj, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($fayuj, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($fayuj);
curl_close($fayuj);

$resp = str_replace('Ajex API', "Janti Api", $resp);
echo $resp;
}
?>