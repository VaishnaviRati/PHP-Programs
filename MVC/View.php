<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
  <?php
  include 'model.php';
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
</body>
</html>
