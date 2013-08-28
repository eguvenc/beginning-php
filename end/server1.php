<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('content-type: application/json; charset=utf-8');

include 'metods.php';

$b = new Server_Reply();
$b->server();