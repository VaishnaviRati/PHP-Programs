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
    $email = $_POST['email'];
    $id = $_POST['id'];

    //$sql = "UPDATE dbUsers SET password='$pass' WHERE id='3'";
    $sql = "UPDATE dbUsers SET username='$name',email='$email' WHERE id='$id'";
  if(mysqli_query($connection,$sql)) {
     echo "Updated Successfully";
  }
  else {
    echo mysqli_error($connection);
    echo "Failed";
  }


}
?>
