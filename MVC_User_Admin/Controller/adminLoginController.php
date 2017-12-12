<?php
ob_start();
session_start();
    include '../Model/classAdmin.php';
    
    $admin = new Admin();

    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $admin->check_login($emailusername, $password);
        if ($login) {
            // Registration Success
           header("Location: ../Controller/adminViewController.php");
        } else {
            // Registration Failed
            echo 'Wrong username or password';
        }
        
    }
    include '../View/adminLogin.php';
    ob_end_flush();
?>