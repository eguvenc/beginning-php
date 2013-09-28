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

echo $admin.'<hr>';
include 'admin.php';
$permission = new admin();
$selecteduser = "";
$selectedrole = "";
$roles = $permission->RolesToPermit();
$user = $permission->listToPermit();
echo "<form method='POST' action='server.php'><table border=1><tr><td>".$user."</td><td>".$roles."</td></tr><table><input type='submit'></form><hr>";

     

//$selecteduser = $_POST['users'];
//$selectedrole = $_POST['roles'];
//$permission->Permit($selecteduser,$selectedrole);

// $permission->showPermissions();














