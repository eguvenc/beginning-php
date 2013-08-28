<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('content-type: application/json; charset=utf-8');

$response_data = array(
    'elma' => '4',
    'armut' => '8',
    'portakal' => array('kilo' => 2, 'tane' => 1),
);

$METHOD = $_SERVER['REQUEST_METHOD'];
switch ($METHOD) {
    case 'POST':
        $input   = file_get_contents("php://input");
        parse_str($input, $output);
        $command = $output['query'];
        if(isset($response_data[$command])){
            echo json_encode($response_data[$command], true);
        } else {
            echo json_encode(array('error' => 'Command not found'), true);
        }  
        break;
    case 'GET':
        $input = file_get_contents('php://input');
        
        parse_str($input, $output);
        $command = $output['query'];
            if(isset($response_data[$command])){
            echo json_encode($response_data[$command], true);
        } else {
            echo json_encode(array('error' => 'Command not found'), true);
        }
        break;
    case 'PUT':
         $input = file_get_contents('php://input');
        
        parse_str($input, $output);
        $command = $output['query'];
            if(isset($response_data[$command])){
            echo json_encode($response_data[$command], true);
        } else {
            echo json_encode(array('error' => 'Command not found'), true);
        }
        break;
    default:
        break;
}