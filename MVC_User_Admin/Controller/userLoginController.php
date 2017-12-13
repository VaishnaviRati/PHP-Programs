<?php
ob_start();
session_start();
    include '../Model/classUser.php';
    $user = new User();

    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $user->check_login($emailusername, $password);
        if ($login) {
            // Registration Success
           header("Location: ../Controller/userViewController.php");
        } else {
            // Registration Failed
            echo 'Wrong username or password';
        }
    }
     include '../View/userLogin.php';

    ob_end_flush();
?>