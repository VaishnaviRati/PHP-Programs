<?php
$id= $_GET['id'];
include "class.user.php";
$obj1 = new User();
$userInfo = $obj1->details($id);


 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $update = $obj1->update_changes($name,$email,$phone_number,$id);

 	if ($update==TRUE) {
 // Registration Success
 header("Location:userView.php?msg=update successfully");
 } else {
 // Registration Failed
 echo 'Update Failed';
 }
 }
?>

<html>
<a href="userView.php"> Back</a>
&nbsp;
<a href="userView.php?q=logout" >LOGOUT</a>

<div id="container">
<h1>Edit Your Profile Here</h1>
<form action="" method="post" name="reg">
<table>
<tbody>
<tr>
<th>User Name:</th>
<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' required="" /></td>
</tr>
<tr>
<th>Email:</th>
<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?>' required="" /></td>
</tr>
<tr>
<th>Phone Number:</th>
<td><input type="text" name="phone_number" value='<?php echo $userInfo['phone_number']; ?>' required="" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Update" /></td>
</tr>
<tr>
<td></td>

</tr>
</tbody>
</table>
</form></div>


</html>