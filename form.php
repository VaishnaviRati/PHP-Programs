<!DOCTYPE HTML>
<html>
<head>
<title>Sign-Up</title>
<style>
/*CSS File For Sign-Up webpage*/
#body-color{
background-color:#6699CC;
}
#Sign-Up{
background-image:url('sign-up.png');
background-size:500px 500px;
background-repeat:no-repeat;
background-attachment:fixed;
background-position:center;
margin-top:150px;
margin-bottom:150px;
margin-right:150px;
margin-left:450px;
padding:9px 35px; 
}
#button{
border-radius:10px;
width:100px;
height:40px;
background:#FF00FF;
font-weight:bold;
font-size:20px;
}
</style>
</head>
<body id="body-color">
<div id="Sign-Up">
<fieldset style="width:30%"><legend>Registration Form</legend>
<table border="0">
<tr>
<form method="POST" action="connectivity-sign-up.php">
<td>Name</td><td> <input type="text" name="name"></td>
</tr>
<tr>
<td>Email</td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>UserName</td><td> <input type="text" name="user"></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass"></td>
</tr>
<tr>
<td>Confirm Password </td><td><input type="password" name="cpass"></td>
</tr>
<tr>
<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
</tr>
</form>
</table>
</fieldset>
</div>


<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'registerForm');
define('DB_USER','root');
define('DB_PASSWORD','compass');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>






</body>
</html>


