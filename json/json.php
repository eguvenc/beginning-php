<?php
header("Cache-Control: no-cache");
header('Content-type: text/html; charset=iso-8859-9');

//$array = array(
//    array(
//     "desen" => "karisik",
//    "boya" => "Mavi"   
//    ),
//    array(
//        "desen" => "Modern",
//    "boya" => "Kirmizi"
//    ),
//    array(
//        "desen" => "Klasik",
//    "boya" => "Yesil"
//    )
//);
//
//var_dump( json_encode($array));
echo '[{"desen":"karisik","boya":"Mavi"},{"desen":"Modern","boya":"Kirmizi"},{"desen":"Klasik","boya":"Yesil"}]';