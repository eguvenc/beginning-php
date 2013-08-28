<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//
//$data = array('query' => 'portakal', 'response' => 1);
//$st = curl_init();
//
//curl_setopt($st, CURLOPT_CUSTOMREQUEST, 'PUT');
//curl_setopt($st, CURLOPT_URL, 'http://end/server1.php');
//curl_setopt($st, CURLOPT_POSTFIELDS, http_build_query($data));
//curl_setopt($st, CURLOPT_RETURNTRANSFER  ,1);
//
//$rs = curl_exec($st);
//
//$response = json_decode($rs, true);
//
//print_r($response);
//
//curl_close($st);
include 'Client.php';

$a = new Client();
$a->data = file_get_contents('download.jpg',FILE_BINARY);

// var_dump($a->data);
$a->setMethod('PUT');
echo $a->sendRequest($a->data);



//$client = new Client();
//$client->method('POST', $data);
//$json_response = $client->sendRequest($data);
//
//$response = json_decode($json_response, true);