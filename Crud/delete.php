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

       $id=$_POST['id'];
   
       $sql = "DELETE  FROM dbUsers WHERE  id='$id'";
    //$sql = "UPDATE dbUsers SET name='$name',last_name='$last_name',user_city='$city_name' WHERE user_id=".$_GET['edit_id'];
   if(mysqli_query($connection,$sql)) {
   
      echo "Deleted Sucssuessfully";
   }
   else
   {
      echo mysqli_error($connection);
      echo "Failed";
   }


   }
?>
