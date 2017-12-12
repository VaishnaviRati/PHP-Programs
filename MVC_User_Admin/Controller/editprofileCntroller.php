<?php
$id= $_GET['id'];
include "../Model/classUser.php";
$obj1 = new User();
$userInfo = $obj1->details($id);


 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $update = $obj1->update_changes($name,$email,$phone_number,$id);

 	if ($update==TRUE) {
 // Registration Success
 header("Location: ../View/userView.php?msg=update successfully");
 } else {
 // Registration Failed
 echo 'Update Failed';
 }
 }
?>