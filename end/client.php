<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//$link = "http://end/server1.php";

//$st = curl_init($link);
//
//
//
//
//curl_setopt($st, CURLOPT_POSTFIELDS, http_build_query($data));
//curl_setopt($st, CURLOPT_POST, 1);
//curl_setopt($st, CURLOPT_RETURNTRANSFER  ,1);  
//$rs = curl_exec($st);
//
//$response = json_decode($rs, true);
//
//print_r($response);
//
//curl_close($st);
include 'Client.php';

$b = new Client();
$b->data = array('query' => 'armut', 'response' => 1);
//var_dump($b->data);
$b->setMethod('POST');
echo $b->sendRequest($b->data);


//$client = new Client($METHOD,$data);
//$client->method('POST', $data);
//$json_response = $client->sendRequest();
//
//$response = json_decode($json_response, true);
 