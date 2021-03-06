<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =$productsErr =$subjectsErr= $hobbiesErr= $phoneErr=
$passErr="";
$name = $email = $gender = $comment =$products =$subjects=$hobbies= $phone_number=
$password=$confirm_password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

/*if(empty($_POST["phone_number"])){
  $phoneErr="phoneNumber is required";
}


    if(is_numeric($_POST['phone_number']) && strlen($_POST['phone_number'])==10)   
     {

      $phone_number=$_POST['phone_number'];
    }
    else{
$phoneErr="Invalid Number";
    }*/
if(empty($_POST["phone_number"])){
  $phoneErr="phoneNumber is required";
}
else{
  $phone_number=$_POST['phone_number'];
  if (!preg_match( '/(0|\+?\d{2})(\d{7,8})/', $phone_number)) {
    $phoneErr="phone number in valid";
  }
}

  if(empty($_POST["password"]))
  {
    $passErr="Password is required";
  }
  else
  {
    $password=$_POST["password"];
  }

 if(empty($_POST["confirm_password"]))
  {
    $passErr="Password is required";
  }
  else
  {
    $confirm_password=$_POST["confirm_password"];
  }
/*$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]
{6,15}$/',($_POST['password']),($_POST['confirm_password']))) 
 {
    $passErr='Password must contain 6 characters of letters, numbers and 
    at least one special character.';
}
else
  {
    $password=$_POST["password"];
    $confirm_password=$_POST["confirm_password"];
  }*/
  if ($password != $confirm_password) {
   $passErr="password and confirm password missmatch";
  } 
  







  if (empty($_POST["product"])) {
    $productsErr = "Course is required";
  } else {
    $p=$_POST["product"];
  }

  if (empty($_POST["subjects"])) {
    $subjectsErr = "Favourite subject is required";
  } else {
    $subject=$_POST["subjects"];
  }

  if (empty($_POST["hobbies"])) {
    $hobbiesErr = "";
  } else {
    $hobby=$_POST["hobbies"];
  }
    
   
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender=$_POST["gender"];
  }
}

 $products = array("Java", "C", "C++", "OOP");
 $subjects= array("PHP","UI",".net");
 $hobbies=array("Dancing","Singing","Cooking","Others");



?>

<h2>Registration Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
  Name: <input type="text" name="name" value="<?php echo $name;?>"> 
  <span class="error">* </span>
 
  
  <br><br>
  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
 <span class="error">* </span>
   <br><br>

   Password:<input type="password" name="password" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>

   Confirm Password:<input type="password" name="confirm_password" 
   value="<?php echo $confirm_password;?>">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>

 Phone Number: <input type="text" name="phone_number" value="<?php echo $phone_number;?>">
 <span class="error">* <?php echo $phoneErr;?> </span>
 
  <br><br>

  Course:<select name="product">
        <option value="">Choose one</option>

    <?php
   
        foreach($products as $item){ 

          ?>
          <option value="<?php echo $item ?>" <?php if(isset($p)&& $p==$item)
          echo "selected"?>><?php echo $item ?>
          </option>

        <?php 
      }
    
        ?>
      
      </select> <span class="error">* </span>
  
     <br><br>

      Favourite Subject:<select name="subject[]" multiple="multiple">
        <option value="">Choose one</option>
    <?php
    // <?php if(in_array("Sports",$hobbies)) echo "selected=selected";
        foreach($subjects as $value){ 
          ?>
          <option name="subject" value="<?php echo $value;?>"
            <?php
            $harray = $_POST['subject'];
            if (!empty($harray)){
            if(in_array($value, $harray))
            {
              echo "selected=selected";
            }
          }
            ?> > <?php echo $value ; ?>
  </option>        
  <?php
}

?>
 </select><span class="error">* </span>
    <br><br>


      Hobbies:
    <?php
       foreach($hobbies as $value){ 
          ?>
          <input type="checkbox" name="hobby[]" value="<?php echo $value;?>"
            <?php
            $varray = $_POST['hobby'];
            if (!empty($varray)){
            if(in_array($value, $varray))
            {
              echo "checked=checked";
            }
          }
            ?> > <?php echo $value ; ?>
  <?php
}

?>
     <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* </span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($nameErr) && empty($emailErr) && empty($productsErr) && 
    empty($genderErr)&&empty($phoneErr) && empty($passErr) && empty($passErr))
  {
    echo "<h4><b style='color:green;'> You Registerd Successfully.</b></h4>";

echo "<h2>Your Input:</h2>";
echo "Name : ".$name;
echo "<br>";
echo "Your Email : ".$email;
echo "<br>";
echo "Phone Number :".$phone_number;
echo"<br>";

echo "Course : ".$p;

echo "<br>";

echo "Subjects : ","<br>";
        foreach ($_POST['subject']as $key => $value) {
          
            echo ($key+1).'. '.$value. '<br/>';
        }

    
echo "<br>";
echo "Hobbies : ","<br>";
foreach ($_POST['hobby']as $key => $value) {
  
            echo ($key+1).'. '.$value. '<br/>';
        }

    
echo "<br>";

echo "Gender : ". $gender;
}
else{
echo "<h4><b style='color:red;'> Please fill the correct details and in * </b></h4>";
if(empty($name))
{
 /* echo $nameErr;
  echo "<br>";*/
}
if (empty($email)) {
 /*echo $emailErr;
 echo "<br>";*/
}
 if (empty($product)) {
 /*echo $productsErr;
 echo "<br>";*/
}
 if (empty($subject)) {
 /*echo $subjectsErr;
 echo "<br>";*/
}
 if(empty($gender)){
  /* echo $genderErr;
 echo "<br>";*/
}

if(empty($phone_number)){
  /* echo $genderErr;
 echo "<br>";*/
}
/*
if($phoneErr){
   echo $genderErr;
 echo "<br>";
}
*/
if(empty($password)){
  /* echo $genderErr;
 echo "<br>";*/
}

if(empty($confirm_password)){
  /* echo $genderErr;
 echo "<br>";*/
}

}

}
?>
 </body>
</html>

