<html>
<h2 style= "color: green"><?php echo $_GET['msg']; ?></h2>
&nbsp;
<a href="../View/userView.php?q=logout" >LOGOUT</a>

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

<td><a href='../View/editUsers.php?userid=<?php echo $userInfo['id']; ?>' >Edit</a></td>

<form  action="" method="post" >
	<input type="hidden" name="dUser" value="<?php echo $userInfo['id']; ?>">
<td><input type="submit" name="dsubmit" value="disable" style="color:red"></td>
</form>



<form  action="" method="post" >
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

<td><a href='../View/editUsers.php?userid=<?php echo $userInfo['id']; ?>' >Edit</a></td>

<form  action="" method="post" >
	<input type="hidden" name="eUser" value="<?php echo $userInfo['id']; ?>">
<td><input type="submit" name="esubmit" value="enable" style="color:green"></td>
</form>

<form  action="" method="post" >
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


