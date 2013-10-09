<?php
session_start();
if(isset($_SESSION['admin']))
{
    header("location:panel.php");
}
?>

<form method="POST" action="/../panel.php">
    Username <input type="text" name="username" /><br>
    Password <input type="password" name="password"/><br>
    <input type="submit" value="LogIn"/>
</form>
