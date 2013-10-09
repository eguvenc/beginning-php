<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '12345', 'magento1');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (!isset($_SESSION['admin']))
{
     header('location: login.php'); 
}

include '../../admin.php';
$permission = new admin();
$selecteduser = "";
$selectedrole = "";
$roles = $permission->RolesToPermit();
$user = $permission->listToPermit();
echo "<form method='POST' action='server.php'><table border=1><tr><td>".$user."</td><td>".$roles."</td></tr><table><input type='submit'></form><hr>";