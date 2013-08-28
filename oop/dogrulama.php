<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once 'kaydet.php';

$a = new kaydet();
$a->kayit();
echo $a->kayit();
?>
