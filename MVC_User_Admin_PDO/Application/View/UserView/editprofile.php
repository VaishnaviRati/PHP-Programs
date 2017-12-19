<html>
<head>
	<style>
	.error {color: #FF0000;}
	</style>
</head>

	<a href="index.php?page=details"> Back</a>
	&nbsp;
	<a href="index.php?page=user_login&&q=logout" >LOGOUT</a>

	<div id="container">
	<h1>Edit Your Profile Here</h1>
	<form action="index.php?page=edit_profile&&id=<?php echo $id; ?>" method="post" name="reg">
	<table>
	<tbody>
	<tr>
	<th>User Name:</th>
	<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' required="" />
	<span class="error">* <?php echo $nameErr;?></td>
	</tr>
	<tr>
	<th>Email:</th>
	<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?>' required="" />
	<span class="error">* <?php echo $emailErr;?></td>
	</tr>
	<tr>
	<th>Phone Number:</th>
	<td><input type="text" name="phone_number" value='<?php echo $userInfo['phone_number']; ?>' required="" />
	<span class="error">* <?php echo $phoneErr;?></td>
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