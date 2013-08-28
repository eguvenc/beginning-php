<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

class Server_Reply
{
    public $response_data = array(
    'elma' => '4',
    'armut' => '8',
    'portakal' => array('kilo' => 2, 'tane' => 1),
);
    public function server()
    {   
        switch ($_SERVER['REQUEST_METHOD']){
        
        case 'POST':
        $input   = file_get_contents("php://input");
        parse_str($input, $output);
        $command = $output['query'];
        if(isset($this->response_data[$command])){
            echo json_encode($this->response_data[$command], true);
        } else {
            echo json_encode(array('error' => 'Command not found'), true);
        } break;
        
        case 'PUT':
            $input   = file_get_contents("php://input");
            break;
        case 'GET':
             $input = file_get_contents('php://input');
        
        parse_str($input, $output);
        $command = $output['query'];
            if(isset($this->response_data[$command])){
            echo json_encode($this->response_data[$command], true);
        } else {
            echo json_encode(array('error' => 'Command not found'), true);
        }
        break;
            
            
        }
    }               
                
}
    



