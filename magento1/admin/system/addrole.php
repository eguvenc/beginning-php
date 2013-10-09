<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

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
echo '<hr>';

include_once '../../admin.php';
$rolecheck = new admin();
if ($_POST)
 $roles = $rolecheck->AddRole();
?>



