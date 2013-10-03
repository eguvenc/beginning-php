<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');


$data = $_POST['username'] ;
$pass =  md5($_POST['password']);


if(!empty($data) && !empty($pass))
{$bag = mysql_connect('localhost','root','12345');
    mysql_select_db('admin',$bag);
    $ctrl_result = mysql_query("SELECT username,password,user_id FROM admin_user WHERE username = '$data' AND password='$pass'"); 
            $row = mysql_fetch_array($ctrl_result);
            $user_id = $row['user_id'];
            $ctrl = mysql_num_rows($ctrl_result); 
           
        if ($ctrl > 0)
                        {
                          $oturum = $_SESSION['admin']=true;
                          echo "logged in as ".$data;
                          $_SESSION['admin'] = $data;
                          include 'admin.php';
                          $getpages = new admin();
                         $ourpages = $getpages->EnablePages($user_id);
                          header("Refresh: 2; url=panel.php"); 
                        }
                        else 
                        {   
                            echo "yanlis"; 
                            header("Refresh: 2; url=login.php"); 
                        }

}                        
?>
