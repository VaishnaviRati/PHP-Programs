<?php
$id= $_GET['id'];
$userIds=$_GET['uid'];

include "../Model/classAdmin.php";
include '../Model/validation.php';
include '../View/adminView.php';
$obj1 = new Admin();
$users = $obj1->user_details($id);
if (isset($_POST['submit'])){
 $delete = $obj1->delete_user($_POST['deleteUser']); 
 
	if($delete)
	{
		echo "deleted";
	}
	else
	{
		echo " not deleted";
	}
}
 if (isset($_REQUEST['dsubmit'])){
 extract($_REQUEST);
 $disable = $obj1->status_disable($_POST['dUser']); 

 	if ($disable==TRUE) {
 // Registration Success
 	
 } else {
 // Registration Failed
 
 }
 }

if (isset($_REQUEST['esubmit'])){
 extract($_REQUEST);
 $disable = $obj1->status_enable($_POST['eUser']); 

 	if ($disable==TRUE) {
 
 	
 } else {
 
 
 }
 }

?>
