<?php
$id= $_GET['id'];
include '../Model/validation.php';
include "../Model/classUser.php";
$user = new User();
$userInfo = $user->details($id);

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    if(empty($nameErr) && empty($emailErr) && empty($phoneErr)) {
         $update = $user->update_changes($name,$email,$phone_number,$id);

 	     if ($update==TRUE) {
              header("Location: ../Controller/userViewController.php?msg=update successfully");
         } else {
              echo 'Update Failed';
         }
    }
}
include '../View/editprofile.php';
?>