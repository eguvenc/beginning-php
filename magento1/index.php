<?php
session_start();
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

echo '<hr>';

include_once 'admin.php';
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

<form method="POST" action ="<?php echo $_SERVER['PHP_SELF'];  ?> ">
    <table>
        <tr>
            <td><?php echo $toedit; ?></td><td><?php if (isset($_POST['rolestoedit'])) echo $roleedit;  ?></td><td><?php if (isset($_POST['perm']) && isset($_POST['permissionid'])) echo $editchanges;  ?></td>
        </tr>
        <tr>
            <td><input type="submit" name="show" id="show" value="show"</td>
        </tr>
    </table>
    
    
</form>



