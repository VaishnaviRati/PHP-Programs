<html>
<body>
 Country:<select name="country">
        <option value="">Choose one</option>
    <?php
   
        foreach($countryArr as $item){ 
          ?>
          <option value="<?php echo $item ?>" <?php if(isset($countrys)&& $countrys==$item)
          echo "selected"?>><?php echo $item ?>
          </option>
        <?php 
      }
    
        ?>
      
      </select><span class="error">* <?php echo $countryErr;?></span>
  
     <br><br>

    <?php

    
  if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
    $countrys=$_POST["country"];
  }

    if(isset($_POST["country"])){

        // Capture selected country

        $country = $_POST["country"];

         

        // Define country and city array

        $countryArr = array(

                        "usa" => array("New Yourk", "Los Angeles", "California"),

                        "india" => array("Mumbai", "New Delhi", "Bangalore"),

                        "uk" => array("London", "Manchester", "Liverpool")

                    );

         

        // Display city dropdown based on country name

        if($country !== 'Select'){

            echo "<label>City:</label>";

            echo "<select>";

            foreach($countryArr[$country] as $value){

                echo "<option>". $value . "</option>";

            }

            echo "</select>";

        } 

    }

    ?>

</body>
</html>