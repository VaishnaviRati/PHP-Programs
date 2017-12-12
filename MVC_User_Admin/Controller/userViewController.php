<?php
session_start();
include '../Model/classUser.php';
$user = new User(); 
$id = $_SESSION['id'];
if (!$user->get_session()){
 header("Location: ../View/login.php");
}

if (isset($_GET['q'])){
 $user->user_logout();
 header("Location: ../View/welcome.php");
 }
 ?>