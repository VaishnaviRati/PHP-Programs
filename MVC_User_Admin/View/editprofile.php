<html>
<a href="../View/userView.php"> Back</a>
&nbsp;
<a href="../View/userView.php?q=logout" >LOGOUT</a>

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