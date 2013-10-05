<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');


$data = $_POST['username'] ;
$pass =  md5($_POST['password']);


if(!empty($data) && !empty($pass))
{ 
  include 'admin.php';
  $checkuser = new admin();
 echo $ourpages = $checkuser->CheckIn($data, $pass);
     exit;      
        if ($ctrl > 0)
                        {
                          $oturum = $_SESSION['admin']=true;
                          echo "logged in as ".$data;
                          $_SESSION['admin'] = $data;
                          header("Refresh: 2; url=panel.php"); 
                        }
                        else 
                        {   
                            echo "yanlis"; 
                            header("Refresh: 2; url=login.php"); 
                        }

}                        
?>
