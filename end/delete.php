<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$link = "http://end/server1.php";
$data = array('query' => 'armut', 'response' => 1);
$st = curl_init($link);




curl_setopt($st, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($st, CURLOPT_CUSTOMREQUEST,'DELETE');
curl_setopt($st, CURLOPT_RETURNTRANSFER  ,1);  
$rs = curl_exec($st);

$response = json_decode($rs, true);

print_r($response);

curl_close($st);