<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
  $selecteduser = $_POST['users'];
  $selectedrole = $_POST['roles'];
  include '../../admin.php';
$permission = new admin();
$permission->Permit($selectedrole, $selecteduser);

header('location:permissions.php');
