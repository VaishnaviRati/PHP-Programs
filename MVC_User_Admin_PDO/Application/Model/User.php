<?php
namespace Compassite\Model;

class User
{
    public $db;
    CONST USER_ROLE = 2;
    CONST DISABLE = 0;
    
    /*** for registration process ***/
    public function reg_user($name, $username, $password, $email, $phone_number, $role, $status)
    {
        $db = new DBConnection();
        $password = md5($password);
        $register_sql = "SELECT * FROM dbUsers WHERE username='$username' OR email='$email'";
        //checking if the username or email is available in db
        $check = $db->pdo->prepare($register_sql);
        $count_row = $check->num_rows;
        if ($count_row == 0) {
            $register_sql1 = "INSERT INTO dbUsers (username,password,email,phone_number,role_id,status) 
            VALUES('$name','$password','$email',$phone_number,".self::USER_ROLE.",".self::DISABLE.")";
            $result =$db->pdo->prepare($register_sql1);
            return $result->execute();
        }
    }
    /*** for login process ***/
    public function check_login($emailusername, $password)
    {
        $db = new DBConnection();
        $password  = md5($password);
        $login_sql = "SELECT id from dbUsers WHERE  username='$emailusername' and password='$password' and role_id=".self::USER_ROLE." ";
        //checking if the username is available in the table
        $result = $db->pdo->prepare($login_sql);
        $result->execute();
        $user_data=$result->fetch(\PDO::FETCH_ASSOC);
        $count_row = sizeof($user_data);
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            return true;
        }
        
    }
    
    /*** for showing the username or fullname ***/
    public function get_fullname($id)
    {
        $db = new DBConnection();
        $getfullname_sql = "SELECT * FROM dbUsers WHERE id = $id";
        $result = $db->pdo->prepare($getfullname_sql);
        $result->execute();
        $user_data = $result->fetch(\PDO::FETCH_ASSOC);
        echo "<b>User Name:</b>" . $user_data['username'] . "<br>";
        echo "<b>email :</b> " . $user_data['email'] . "<br>";
        echo "<b>Phone Number :</b> " . $user_data['phone_number'];
    }
    /*** To get the details in editprofile in user ***/
    public function details($id)
    {
        $db = new DBConnection();
        $details_sql = "SELECT * FROM dbUsers WHERE id = $id";
        $result = $db->pdo->prepare($details_sql);
        $result->execute();
        return $user_data = $result->fetch(\PDO::FETCH_ASSOC); 
    }
    
    public function update_changes($name, $email, $phone_number, $id)
    {
        $db = new DBConnection();
        $update_sql = "UPDATE dbUsers SET username = '$name', email ='$email' ,phone_number='$phone_number' WHERE id = $id";
        $result = $db->pdo->prepare($update_sql);
        return $result->execute();
    }
    
    /*** starting the session ***/
    public function get_session()
    {
        return $_SESSION['login'];
    }
    
    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
    
}
?>
