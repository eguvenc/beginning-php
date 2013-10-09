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
