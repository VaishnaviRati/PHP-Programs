<?php
include 'View.php';

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