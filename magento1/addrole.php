<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '12345', 'magento1');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION['admin']))
{
     header('location: login.php'); 
}
$admin = '<a href="adduser.php">Add User</a>'.' ';
$admin .= '<a href="addrole.php">Add Role</a>'.' ';
$admin .= '<a href="permit.php">Permissions</a>'.' ';
$admin .='<a href="logout.php">Log Out</a>';

echo $admin;

$addrole = "<form method='POST' action='addrole.php'>Role Name: <input type = 'text' name='role_name'/></br>";
$addrole .="<ul><input type='hidden' name='resource[]' value='__root__'/>
<li><input type='checkbox' name='resource[]' value='admin/sales'/>Sales</li>
<ul><li><input type='checkbox' name='resource[]' value='admin/sales/order'/>Orders</li>
<ul><li><input type='checkbox' name='resource[]' value='admin/sales/order/actions'/>Actions</li>
</ul>";

$addrole .= "<input type='submit' /></form>";
echo $addrole;
echo '<hr>';

include_once 'admin.php';
$rolecheck = new admin();
if ($_POST)
 $roles = $rolecheck->AddRole();



