 <?php 
 $_SESSION['admin'] = $data;
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	include 'admin.php'; 
	$data = $_POST['username'] ;
	$pass =  md5($_POST['password']);
    	if(!empty($data) && !empty($pass))
    	{		
    		$pages = new admin();
    		$usercheck = $pages->CheckIn($data, $pass);
    		$user_id = $pages->getUserIds($data,$pass);
    		$enablepages = $pages->EnablePages($user_id);
    	}
    	else
    		echo 'Eksik Bilgi Girisi!';
    		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	 <title>Admin Panel</title>
	 <link href="bootstrap.css" rel="stylesheet" media="screen"/>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="bootstrap.js"></script>
</head>
<body>
	 <? if (isset($usercheck))echo $usercheck;?><? if (isset($enablepages))echo $enablepages;?>
</body>
</html>
