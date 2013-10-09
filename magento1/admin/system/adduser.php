<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (!isset($_SESSION['admin']))
{
     header('location: ../../login.php'); 
}
$add = "<form id='addform' method='POST' action='../../usercheck.php'>";
$add .="User Name :"."<input type='text' name = 'username'/><br>";
$add .="First Name :"."<input type='text' name = 'firstname'/><br>";
$add .="Last Name :"."<input type='text' name = 'lastname'/><br>";
$add .="Email :"."<input type='text' name = 'email'/><br>";
$add .="Password :"."<input type='password' name = 'password'/><br>";
$add .="Password Confirmation :"."<input type='password' name = 'password'/><br>";
$add .="This account is :"."<select name='is_active'><option value='1'>Active</option>
<option value='0'>Inactive</option>
</select><br>";
$add .="<input type='submit' id='submit'/></form>";
echo $add;
$enablepages = $_SESSION['enablepages'];

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
