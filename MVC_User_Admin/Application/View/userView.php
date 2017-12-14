<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<style><!--
 body{
 font-family:Arial, Helvetica, sans-serif;
 }
 h1{
 font-family:'Georgia', Times New Roman, Times, serif;
 }
--></style>
<h1 style="color : green"><?php echo $_GET['msg']; ?></h1>
<div id="container">
<a href="index.php?page=user_login&&q=logout" >LOGOUT</a>
&nbsp;
<a href="index.php?page=edit_profile&&id=<?php echo $id;?>">Edit Profile</a>


<div id="main-body">
<h3>Hello , Your Profile details </h3>
 <br>
<?php $user->get_fullname($id); ?>
</div>
<div id="footer"></div>
</div>

 </html>

