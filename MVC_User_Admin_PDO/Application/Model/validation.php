<?php

namespace Compassite\Model;

$nameErr = $emailErr = $phoneErr = $passErr = "";
$name    = $email = $phone_number = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
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
    
    if (empty($_POST["phone_number"])) {
        $phoneErr = "phoneNumber is required";
    } else {
        $phone_number = $_POST['phone_number'];
        if (!preg_match('/(0|\+?\d{2})(\d{7,8})/', $phone_number)) {
            $phoneErr = "phone number in valid";
        }
    }
}
?>
