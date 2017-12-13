<?php
ob_start();
session_start();
include '../Model/classAdmin.php';
$admin = new Admin();

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $admin->check_login($emailusername, $password);
    if ($login) {
        header("Location: ../Controller/adminViewController.php");
    } else {
        echo 'Wrong username or password';
    }
        
}
include '../View/adminLogin.php';
ob_end_flush();
?>