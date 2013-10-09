<?php 
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('access',"False"); 
 if (!isset($_SESSION['admin']))
{
     header('location: ../../login.php'); 
}

$addrole = "<form method='POST' action='addrole.php'>Role Name: <input type = 'text' name='role_name'/></br>";
$addrole .="<ul><input type='hidden' name='resource[]' value='admin'/>
<li><input type='checkbox' name='resource[]' value='admin/sales/'/>Sales</li>
<ul><li><input type='checkbox' name='resource[]' value='admin/sales/products.php'/>Products</li>
<li><input type='checkbox' name='resource[]' value='admin/sales/discounts.php'/>Discounts</li>
<li><input type='checkbox' name='resource[]' value='admin/sales/order.php'/>Orders</li></ul></li>
<li><input type='checkbox' name='resource[]' value='admin/reports/'/>Reports</li><ul>
<li><input type='checkbox' name='resource[]' value='admin/reports/orderreviews.php'/>Orderreviews</li>
<li><input type='checkbox' name='resource[]' value='admin/reports/sailing.php'/>Sailing</li>
<li><input type='checkbox' name='resource[]' value='admin/reports/staff.php'/>Staff</li><ul>
<li><input type='checkbox' name='resource[]' value='admin/system/'/>System</li>
<li><input type='checkbox' name='resource[]' value='admin/system/permissions.php'/>Permissions</li>
<li><input type='checkbox' name='resource[]' value='admin/system/users.php'/>Users</li>
<li><input type='checkbox' name='resource[]' value='admin/system/index.php'/>Index</li>
<li><input type='checkbox' name='resource[]' value='admin/system/addrole.php'/>Add Role</li>
<li><input type='checkbox' name='resource[]' value='admin/system/adduser.php'/>Add User</li></li>
</ul>";

$addrole .= "<input type='submit'/></form>";
echo $addrole;
$enablepages = $_SESSION['enablepages'];
echo '<hr>';

include_once '../../admin.php';
$rolecheck = new admin();
if ($_POST)
 $roles = $rolecheck->AddRole();
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



