<?php
namespace Compassite\Model;

class User
{
    public $db;
    public function __construct()
    {
        $this->db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }
    /*** for registration process ***/
    public function reg_user($name, $username, $password, $email, $phone_number, $role, $status)
    {
        $password     = md5($password);
        $register_sql = "SELECT * FROM dbUsers WHERE username='$username' OR email='$email'";
        //checking if the username or email is available in db
        $check        = $this->db->query($register_sql);
        $count_row    = $check->num_rows;
        if ($count_row == 0) {
            $register_sql1 = "INSERT INTO dbUsers (username,password,email,phone_number,role_id,status) 
            VALUES('$name','$password','$email',$phone_number,2,0)";
            $result = mysqli_query($this->db, $register_sql1) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;
        }
    }
    /*** for login process ***/
    public function check_login($emailusername, $password)
    {
        $password  = md5($password);
        $login_sql = "SELECT id from dbUsers WHERE  username='$emailusername' and password='$password' and role_id=2 ";
        //checking if the username is available in the table
        $result    = mysqli_query($this->db, $login_sql);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id']    = $user_data['id'];
            return true;
        }
        
    }
    
    /*** for showing the username or fullname ***/
    public function get_fullname($id)
    {
        $getfullname_sql = "SELECT * FROM dbUsers WHERE id = $id";
        $result          = mysqli_query($this->db, $getfullname_sql);
        $user_data       = mysqli_fetch_array($result);
        echo "<b>User Name:</b>" . $user_data['username'] . "<br>";
        echo "<b>email :</b> " . $user_data['email'] . "<br>";
        echo "<b>Phone Number :</b> " . $user_data['phone_number'];
    }
    /*** To get the details in editprofile in user ***/
    public function details($id)
    {
        $details_sql = "SELECT * FROM dbUsers WHERE id = $id";
        $result      = mysqli_query($this->db, $details_sql);
        $user_data   = mysqli_fetch_array($result);
        return $user_data;
    }
    
    public function update_changes($name, $email, $phone_number, $id)
    {
        $update_sql = "UPDATE dbUsers SET username = '$name', email ='$email' ,phone_number='$phone_number' WHERE id = $id";
        $result     = mysqli_query($this->db, $update_sql);
        if ($result === TRUE) {
            return TRUE;
        }
        
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
