<?php
session_start();
unset($_SESSION['admin']);
session_destroy($_SESSION['admin']);
echo 'oturum kapandı';
 header("Refresh: 1; url=login.php"); 
?>
