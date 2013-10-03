 <?php 
    		error_reporting(E_ALL);
    		ini_set('display_errors', 'On');
    		include 'admin.php'; 
    		$pages = new admin();
    		$enablepages = $pages->EnablePages($user_id);
    		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	 <title>Bootstrap 101 Template</title>
	 <link href="bootstrap.css" rel="stylesheet" media="screen"/>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="bootstrap.js"></script>
</head>
<body>
	 <? if (isset($enablepages))echo $enablepages;?>
</body>
</html>
