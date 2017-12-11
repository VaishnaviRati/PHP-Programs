<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

include ('config.php');


$nameErr = $emailErr = $genderErr = $phoneErr= $passErr=$roleErr="";
$name = $email = $gender = $phone_number=$password=$role="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if(empty($_POST["password"])) {
    $passErr="Password is required";
  }
  else {
    $password=$_POST["password"];
    $pass=md5($password);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
   }
  }

  if(empty($_POST["phone_number"])){
    $phoneErr="phoneNumber is required";
  }
  else{
    $phone_number=$_POST['phone_number'];

   if (!preg_match( '/(0|\+?\d{2})(\d{7,8})/', $phone_number)) {
    $phoneErr="phone number in valid";
   }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } 
  else {
    $gender=$_POST["gender"];
  }

  if(empty($_POST['role'])) {
    $roleErr="Role is required";
  }

  else {
    $role=$_POST['role'];
  }
}

?>

<h2>Registration Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
User Name: <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>


Password:<input type="password" name="password" value="<?php echo $password;?>">
<span class="error">* <?php echo $passErr;?></span>
<br><br>

Role : <select name="role">
   <option value="">Select Role</option>


<?php
 
   $query="SELECT * FROM roles";


   $result=mysqli_query($connection,$query);
   while ($row=mysqli_fetch_array($result)) { 
   
    print_r($row['role']);?>
   <option value="<?php echo $row['role_id']?>"<?php if(isset($role)&& $role==$row['role_id'])
          echo "selected"?>><?php echo $row['role_name']?> </option>
   <?php } ?>
  </select><span class="error">* <?php echo $roleErr;?> </span>


  <br><br>

    
E-mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>

Phone Number: <input type="text" name="phone_number" value="<?php echo $phone_number;?>">
<span class="error">* <?php echo $phoneErr;?> </span>
<br><br>
   
<input type="submit" name="submit" value="Register">  

</form>

<?php
  if(isset($_POST["submit"])) {

    $sql = "INSERT INTO dbUsers (username,password,email,phone_Number,role_id) 
    VALUES('$name','$pass','$email','$phone_number','$role')";
   //echo $connection, $sql;
    if(mysqli_query($connection,$sql)) {
      echo "succsefully Registered";
    }
    else {
      echo mysqli_error($connection);
      echo "Failed";
    }


  } 
?>

</body>
</html>
