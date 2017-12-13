<?php
include '../Model/validation.php';
include "../Model/classAdmin.php";
$id= $_GET['id'];
$userId = $_GET['userid'];
$admin = new Admin();
$result = $admin->user_detailsOnId($userId);
if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    if(empty($nameErr) && empty($emailErr) && empty($phoneErr)) {
         $update = $admin->update_changes($name,$email,$phone_number,$uid);

 	     if ($update==TRUE) {
             header("Location: ../Controller/adminViewController.php?msg=update successfully");
         } 
         else {
             echo 'Update Failed';
         }
    }
}
include '../View/editUsers.php';
?>