<html>

<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<a href="index.php?page=login&&q=logout" >LOGOUT</a>

<div id="container">
<h1>Edit Users Profile Here</h1> 
<form action="index.php?page=edit&&userid=<?php echo $userId; ?>" method="post" name="reg">
<table>
<tbody>
	<?php
	foreach ($result as $key => $userInfo) {
	 	 ?>
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