<?php
include 'validation.php';
include "class.admin.php";

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

<html>

<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<a href="userView.php?q=logout" >LOGOUT</a>

<div id="container">
<h1>Edit Users Profile Here</h1>
<form action="" method="post" name="reg">
<table>
<tbody>
	<?php while ($userInfo = $result->fetch_assoc()) { ?>
	<input type="hidden" name="uid" value='<?php echo $userInfo['id']; ?>' required="" />

<tr>
<th>User Name:</th>
<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' required="" />  
  <span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>
<th>Email:</th>
<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?>' required="" />
  <span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
<th>Phone Number:</th>
<td><input type="text" name="phone_number" value='<?php echo $userInfo['phone_number']; ?>' required="" />
  <span class="error">* <?php echo $phoneErr;?></span></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Update" /></td>
</tr>
<tr>
<td></td>

</tr>
<?php }?>
</tbody>
</table>
</form></div>


</html>