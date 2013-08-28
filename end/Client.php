<?php

class Client
{
    public $data;
    public $METHOD;
    public $url = "http://end/server1.php";
    
    public function __construct() {
    }
    
    public function setMethod($method){
        $this->METHOD = $method;
    }
    
    public function sendRequest($data)
            {
                switch ($this->METHOD)
                    {
                        case 'PUT':
                            $ch=curl_init($this->url);
                            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,  $this->METHOD);
                            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                            curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Length:'.  strlen($this->data)));
                            curl_setopt($ch,CURLOPT_POSTFIELDS,  $this->data);
                            $response = curl_exec($ch);
                            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);
                             if ($status==200){ echo '<br />' . "OK"; }
                               if ($status==301){ echo '<br />' . "Moved permanently"; }
                                 if ($status==404){ echo '<br />' . "NOT FOUND"; }
                            return $response;
                                
                            
                         break;
                        case 'POST':
                            $ch=curl_init($this->url);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->data));
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1); 
                            $rs = curl_exec($ch);
                                curl_close($ch);
                            $response = json_decode($rs, true);
                                
                            print_r($response);

                            
                    }
            }
    
}
