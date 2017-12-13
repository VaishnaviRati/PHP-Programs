<?php
$id= $_GET['id'];
$userIds=$_GET['uid'];
include "../Model/classAdmin.php";
include '../Model/validation.php';
$admin = new Admin();
$users = $admin->user_details($id);
if (isset($_POST['submit'])) {
    $delete = $admin->delete_user($_POST['deleteUser']); 
    if($delete) {
	    echo "deleted";
	} else {
		echo " not deleted";
	}
}
if (isset($_REQUEST['dsubmit'])) {
    extract($_REQUEST);
    $disable = $admin->status_disable($_POST['dUser']); 
 	if ($disable==TRUE) {
 
    } 
 }

if (isset($_REQUEST['esubmit'])) {
    extract($_REQUEST);
    $disable = $admin->status_enable($_POST['eUser']); 
    if ($disable==TRUE) {
    
    } 
}
include '../View/adminView.php';
?>
