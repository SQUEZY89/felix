<?php

$auth_key = "jantiapiservices";


if($_GET['auth'] != $auth_key) {    
    echo json_encode(array('success' => false, 'message' => 'auth key nerde amcik herif'));
    die();
} else {
    $neu_proxy = "195.175.22.194";
    $neu_proxyport = "5678";
    $cookie = "ASP.NET_SessionId=ot1mka1skesbbiyxxfxbrhxh";
    $tc = $_GET['tc']
    $ch = curl_init();
    curl_setopt($ch, $CURLOPT_URL,
    "https://ats.saglik.gov.tr/api/rapor/uygulamasorguladetay?criteria=%7B%22TcKimlik%22:%22$tc%22,%22HibeListele%22:false%7D");
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_HTTPGET, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt ($ch, CURLOPT_PROXY, $neu_proxy);
    curl_setopt ($ch, CURLOPT_PROXYPORT, $neu_proxyport);
    curl_setopt ($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt ($ch, USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36");
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json, text/plain, */*
        'Accept-Encoding: gzip, deflate, br',
        'Accept-Language: en-US,en;q=0.9',
        'Authorization: JWT eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0aWQiOiIwODJhMzAwMi1jMWI0LTRlYTUtOGZhZi05YjYzMmQyZWFiMmYiLCJ1c3IiOiI0NTg1MDcyMjMwNiIsImJybSI6MTM2OCwiZGVwIjoxMzY4LCJkaWwiOjF9.J7ajKRlhASCus_WQombDqpMttAm7hJQYCIGfho20EyU',
        'Connection: keep-alive',
        'Host: ats.saglik.gov.tr',
        'Referer: https://ats.saglik.gov.tr/pages/src/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
        ));
    
    $resp = curl_exec($ch);
    /* bastır */
    print_r($resp);
    /* proxy ip */


}



?>