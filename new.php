
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
    $nameErr = $emailErr = $genderErr = $websiteErr = $courseErr = $hobbiesErr = $subjectErr = "";
    $name = $email = $gender = $comment = $website = $course = $hobbies = $subject = "";
//echo '<pre>';print_r($_POST); die;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_POST["name"];
        }
  
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST["email"];
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = $_POST["comment"];
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = $_POST["gender"];
        }

        if (empty($_POST["course"])) {
            $courseErr = "Course is required";
        } else {
            $course = $_POST["course"];
        }

        if (empty($_POST["hobbies"])) {
            $hobbiesErr = "Hobbies is required";
        } else {
            $hobbies = $_POST["hobbies"];
        }

        if (empty($_POST["subject"])) {
            $subjectErr = "Subject is required";
        } else {
            $subject = $_POST["subject"];
        }
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Course:
    <select name="course">
        <option value="">Select Course</option>
        <option value="C" <?php if($course=="C") echo "selected=selected";?>>C</option>
        <option value="Java" <?php if($course=="Java") echo "selected=selected";?>>Java</option>
        <option value="Php" <?php if($course=="Php") echo "selected=selected";?>>Php</option>
    </select>
    <span class="error">* <?php echo $courseErr;?></span>
    <br><br>

    Hobbies:
    <select name="hobbies[]" multiple>
        <option value="">Select Hobbies</option>
        <option value="Sports" <?php if(in_array("Sports",$hobbies)) echo "selected=selected";?>>Sports</option>
        <option value="Music" <?php if(in_array("Music",$hobbies)) echo "selected=selected";?>>Music</option>
        <option value="Dance" <?php if(in_array("Dance",$hobbies)) echo "selected=selected";?>>Dance</option>
    </select>

    <span class="error">* <?php echo $hobbiesErr;?></span>
    <br><br>

    Favourite Subject:
    <input type="checkbox" name="subject[]" value="Math"
        <?php if(in_array("Math",$subject)) echo "checked=checked";?>
    /> Math <input type="checkbox" name="subject[]" value="Physics"
        <?php if(in_array("Physics",$subject)) echo "checked=checked";?>
    /> Physics <input type="checkbox" name="subject[]" value="Chemistry"
        <?php if(in_array("Chemistry",$subject)) echo "checked=checked";?>
    /> Chemistry


    <span class="error">* <?php echo $subjectErr;?></span>
    <br><br>

    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
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
    echo '<strong>Name</strong>';
    echo '<br/>';
    echo $name;
    echo "<br>";
    echo "<br>";
    echo '<strong>Email</strong>';
    echo '<br/>';
    echo $email;
    echo "<br>";
    echo "<br>";
    echo '<strong>Comment</strong>';
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo "<br>";
    echo '<strong>Gender</strong>';
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo "<br>";
    echo '<strong>Course</strong>';
    echo "<br>";
    echo $course;
    echo "<br>";
    echo "<br>";
    echo '<strong>Hobbies</strong>';
    echo "<br>";
    if (!empty($hobbies)) {
        foreach ($hobbies as $key => $value) {
            echo ($key+1).'. '.$value. '<br/>';
        }

    }
    echo "<br>";
    echo "<br>";
    echo '<strong>Subject</strong>';
    echo "<br>";
    if (!empty($subject)) {
        foreach ($subject as $key => $value) {
            echo ($key+1).'. '.$value. '<br/>';
        }

    }
    ?>

</body>
</html>
