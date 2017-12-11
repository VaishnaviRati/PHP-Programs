<?php
$id= $_GET['id'];
$userIds=$_GET['uid'];

include "class.admin.php";
include 'validation.php';
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



<html>
<h2 style= "color: green"><?php echo $_GET['msg']; ?></h2>
&nbsp;
<a href="userView.php?q=logout" >LOGOUT</a>

<div id="container">
<h1>Users Profile</h1>
<form action="" method="post" name="submit">
<table>
<tbody>
	<tr>

<th>User Name</th>
<th>Email</th>
<th>Phone Number</th>

</tr>
	<?php while ($userInfo = mysqli_fetch_array($users)) { 
		
		if($userInfo['status'] == 1){

		?>	
<tr>
<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' readonly /></td>
<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?>' readonly /></td>
<td><input type="text" name="phone_number" value='<?php echo $userInfo['phone_number']; ?>'readonly/></td>

<td><a href='editUsers.php?userid=<?php echo $userInfo['id']; ?>' >Edit</a></td>

<form  action="adminView.php" method="post" >
	<input type="hidden" name="dUser" value="<?php echo $userInfo['id']; ?>">
<td><input type="submit" name="dsubmit" value="disable" style="color:red"></td>
</form>



<form  action="adminView.php" method="post" >
	<input type="hidden" name="deleteUser" value="<?php echo $userInfo['id']; ?>">
<td><input type="submit" name="submit" value="delete"></td>
</form>
</tr>
<?php

}
else{
?>
<tr>
<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' readonly /></td>
<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?>' readonly /></td>
<td><input type="text" name="phone_number" value='<?php echo $userInfo['phone_number']; ?>'readonly/></td>

<td><a href='editUsers.php?userid=<?php echo $userInfo['id']; ?>' >Edit</a></td>

<form  action="adminView.php" method="post" >
	<input type="hidden" name="eUser" value="<?php echo $userInfo['id']; ?>">
<td><input type="submit" name="esubmit" value="enable" style="color:green"></td>
</form>

<form  action="adminView.php" method="post" >
	<input type="hidden" name="deleteUser" value="<?php echo $userInfo['id']; ?>">
<td><input type="submit" name="submit" value="delete"></td>
</form>
</tr>
<?php
}
}
?>
</tbody>
</table>
</form></div>


</html>


