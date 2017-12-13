<?php
include '../Model/classUser.php'; 
include '../Model/validation.php'; 
$user = new User(); 
// Checking for user logged in or not

 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
  if((empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passErr)))
  {
 $register = $user->reg_user($name,$username,$password,$email,$phone_number,$role,$status);
 
 if ($register) {
 // Registration Success
 header("Location: ../Controller/userLoginController.php?msg=registered successfully");
 } else {
 // Registration Failed
 echo 'Registration failed. Email or Username already exits please try again';
 }
 }
}
include '../View/registration.php';
?>