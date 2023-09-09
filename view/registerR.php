<?php
include_once '../controllers/userC.php';
include_once '../models/user.php';

$usermame=$_POST['username'];
$pass=$_POST['pass'];
$roles=$_POST['roles'];

$user=new user($usermame,$pass,$roles);
$UserC=new UserC();
$UserC->AjouterUser($user);
header('Location:register.php');

?>
