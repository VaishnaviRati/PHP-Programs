<?php
include 'class.user.php';  
$user = new User(); 
// Checking for user logged in or not

 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $register = $user->reg_user($name,$username,$password,$email,$phone_number,$role);
 if ($register) {
 // Registration Success
 echo 'Registration successful <a href="userLogin.php">Click here</a> to login';
 } else {
 // Registration Failed
 echo 'Registration failed. Email or Username already exits please try again';
 }
 }
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


<style><!--
 #container{width:400px; margin: 0 auto;}
--></style>

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
<form action="" method="post" name="reg">
<table>
<tbody>
<tr>
<th>User Name:</th>
<td><input type="text" name="name" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<th>Email:</th>
<td><input type="text" name="email" required="" /></td>
</tr>
<tr>
<th>Phone Number:</th>
<td><input type="text" name="phone_number" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
</tr>
<tr>
<td></td>
<td><a href="login.php">Already registered! Click Here!</a></td>
</tr>
</tbody>
</table>
</form></div>



</html>