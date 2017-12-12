<?php
include '../Model/validation.php';
include "../Model/classAdmin.php";
include '../View/editUsers';

$id= $_GET['id'];
$userId = $_GET['userid'];

$obj1 = new Admin();
$result = $obj1->user_detailsOnId($userId);

// echo $userInfo;
if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
  if(empty($nameErr) && empty($emailErr) && empty($phoneErr))
  {
 $update = $obj1->update_changes($name,$email,$phone_number,$uid);

 	if ($update==TRUE) {
 // Registration Success
 header("Location: adminView.php?msg=update successfully");
 } 
 else {
 // Registration Failed
 echo 'Update Failed';
 }
 }
}

?>