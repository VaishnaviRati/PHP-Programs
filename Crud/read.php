<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Max-Age: 3600");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 $data = json_decode(file_get_contents("php://input"), true);
// if($_SERVER['REQUEST_METHOD'] == "POST") {
//   echo $data['phone_numner'];
// }

//print_r($_POST); die();
include ('connection.php');
   if($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
   

    //$sql = "INSERT INTO dbUsers (username,password,email,phone_Number) 
    //VALUES('$name','$pass','$email','$phone_number')";
    //$sql = "UPDATE dbUsers SET password='$pass' WHERE id='3'";
    $sql = "select * from dbUsers";
    $result=mysqli_query($connection,$sql);

    foreach ($result as $key => $value) {
      echo json_encode($value);
    }
   if($result)
   {
    echo "Updated Successfully";
   }
    else
    {
      echo mysqli_error($connection);
     echo "Failed";
    }


}
?>
