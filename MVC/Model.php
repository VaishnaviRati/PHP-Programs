<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =$productsErr =$subjectsErr= $hobbiesErr= "";
$name = $email = $gender = $comment =$products =$subjects=$hobbies= "";

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