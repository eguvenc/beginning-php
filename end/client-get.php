<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$data = array('query' => 'elma', 'response' => 1);
$link = "http://end/server1.php";
$st = curl_init($link);
curl_setopt($st, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($st, CURLOPT_CUSTOMREQUEST,"GET");
curl_setopt($st, CURLOPT_RETURNTRANSFER  ,1);
$rs = curl_exec($st);

$response = json_decode($rs, true);

print_r($response);

curl_close($st);
