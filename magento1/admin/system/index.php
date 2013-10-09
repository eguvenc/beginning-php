<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if(!defined('access')){ 
   echo "lütfen menüyü kullanın"; 
   exit(); 
}
if (!isset($_SESSION['admin']))
{
     header('location: admin/system/login.php'); 
}
$enablepages = $_SESSION['enablepages'];

include_once '../../admin.php';
$info = new admin();
echo $users = $info->listUsers();
echo $roles = $info->listRoles().'<hr>';

$toedit = $info->RoleToEdit();
$roleedit = "";
$editchanges = "";
if (isset($_POST['rolestoedit']) && isset($_POST['show']))
{
    $role_id = $_POST['rolestoedit'];
    $roleedit = $info->showPermissions($role_id);
}
else if (isset($_POST['permissionid']) && isset($_POST['edit']))
{
    $permissions = "";
    if (isset($_POST['perm']))
    {
        $permissions = $_POST['perm'];
    }
    $id = $_POST['permissionid'];
    
    $editchanges = $info->EditChanges($permissions, $id);
    
}
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
    
     <form method="POST" action ="<?php echo $_SERVER['PHP_SELF'];  ?> ">
    <table>
        <tr>
            <td><?php echo $toedit; ?></td><td><?php if (isset($_POST['rolestoedit'])) echo $roleedit;  ?></td>
            <td><?php if (isset($_POST['perm']) && isset($_POST['permissionid'])) echo $editchanges;  ?> </td>
        </tr>
        <tr>
            <td><input type="submit" name="show" id="show" value="show"</td>
        </tr>
    </table>
</form>
<? echo "<a href=logout.php>Log OUT</a>"; ?>
     <? if (isset($enablepages))  echo $enablepages.'<br>';?>
</body>
</html>


