<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


<style><!--
 #container{width:400px; margin: 0 auto;}
--></style>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>


<script type="text/javascript" language="javascript">
 function submitreg() {
 var form = document.reg;
 if(form.name.value == ""){
 alert( "Enter name." );
 return false;
 }
 else if(form.name.value == ""){
 alert( "Enter username." );
 return false;
 }
 else if(form.password.value == ""){
 alert( "Enter password." );
 return false;
 }
 else if(form.email.value == ""){
 alert( "Enter email." );
 return false;
 }
 }
</script>
<div id="container">
<h1>Registration Here</h1>
<form action="index.php?page=register" method="post" name="reg">
<table>
<tbody>
<tr>
<th>User Name:</th>
<td><input type="text" name="name" required="" /></td><td><span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<th>Email:</th>
<td><input type="text" name="email" required="" /></td><td><span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
<th>Phone Number:</th>
<td><input type="text" name="phone_number" required="" /></td><td><span class="error">* <?php echo $phoneErr;?></span></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
</tr>
<tr>
<td></td>
<td><a href="index.php?page=user_login">Already registered! Click Here!</a></td>
</tr>
</tbody>
</table>
</form></div>



</html>