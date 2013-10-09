<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '12345', 'magento1');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (!isset($_SESSION['admin']))
{
     header('location: login.php'); 
}
$enablepages = $_SESSION['enablepages'];
include '../../admin.php';
$permission = new admin();
$selecteduser = "";
$selectedrole = "";
$roles = $permission->RolesToPermit();
$user = $permission->listToPermit();
echo "<form method='POST' action='server.php'><table border=1><tr><td>".$user."</td><td>".$roles."</td></tr><table><input type='submit'></form><hr>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	 <title>Admin Panel</title>
	 <link href="../../bootstrap.css" rel="stylesheet" media="screen"/>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="../../bootstrap.js"></script>
</head>
<body>
	<? echo "<a href=logout.php>Log OUT</a>"; ?>
	 <? if (isset($enablepages))  echo $enablepages;?>
</body>
</html>