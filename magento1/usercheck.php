<?php


 $username = $_POST['username'];
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 $isactive = $_POST['is_active'];
 include_once 'admin.php';
 $usercheck = new admin();
 $accept = $usercheck->SaveUser($username, $firstname, $lastname, $email, $password, $isactive);