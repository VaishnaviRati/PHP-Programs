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
$nameErr = $emailErr = $genderErr =$subject =  "";
$name = $email = $gender = $comment =$subject = "";

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
    
    if (empty($_POST["products"])) {
    $products = "";
  } else {
    $products = $_POST["products"];
  }

  if (empty($_POST["course"])) {
    $course = "";
  } else {
    $course = $_POST["course"];
  }


 if (empty($_POST["hobbies"])) {
    $hobbies = "";
  } else {
    $hobbies = $_POST["hobbies"];
  }


        if (empty($_POST["subject"])) {
            $subjectErr = "Subject is required";
        } else {
            $subject = $_POST["subject"];
        }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender=$_POST["gender"];
  }
}

 $products = array("Mobile", "Laptop", "Tablet", "Camera");


?>

<h2>Registration Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
     <select name="products">
        <option value="">Choose one</option>
    <?php
        foreach($products as $item){
       ?>
        <option value="<?php echo $item; ?>"<?php if($item=="$item") echo "selected=selected";?>><?php echo $item; ?></option>
        <?php 
      }
        ?>
<?php if($course=="C") echo "selected=selected";?>
      </select>
  <br><br>

<select name="course">
        <option value="">Select Course</option>
        <option value="C" <?php if($course=="C") echo "selected=selected";?>>C</option>
        <option value="Java" <?php if($course=="Java") echo "selected=selected";?>>Java</option>
        <option value="Php" <?php if($course=="Php") echo "selected=selected";?>>Php</option>
    </select>  <br><br>

   Hobbies: <select name="hobbies[]" multiple="multiple" value="<?php echo hobbiess;?>">                      
  
  <option value="Dancing">Dancing</option>
  <option value="Singing">Singing</option>
  <option value="Reading">Reading</option>
  <option value="Cooking">Cooking</option> 
</select>
  <br><br>

 Favourite Subject:
    <input type="checkbox" name="subject[]" value="Math"<?php if(in_array("Math",$subject)) echo "checked=checked";?> /> Math
    <input type="checkbox" name="subject[]" value="Physics"<?php if(in_array("Physics",$subject)) echo "checked=checked";?>/> Physics
    <input type="checkbox" name="subject[]" value="Chemistry" <?php if(in_array("Chemistry",$subject)) echo "checked=checked";?>/> Chemistry
 <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $subject;
echo "<br>";

echo $products;
echo "<br>";

echo $course;
echo "<br>";

echo '<strong>Subject</strong>';
    echo "<br>";
    if (!empty($subject)) {
        foreach ($subject as $key => $value) {
            echo ($key+1).'. '.$value. '<br/>';
        }

    }
echo "<br>";
echo $gender;
?>
 </body>
</html>
