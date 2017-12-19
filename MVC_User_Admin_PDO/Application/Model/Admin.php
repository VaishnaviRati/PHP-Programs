<?php
namespace Compassite\Model;

class Admin
{
    public $db;
    

    CONST ADMIN_ROLE = 1;
    CONST USER_ROLE = 2;
    CONST ENABLE = 1;
    CONST DISABLE = 0;
    
    /*** for login process ***/
    public function check_login($emailusername, $password)
    {
        $db = new DBConnection();
        $password = md5($password);
        $check_login_sql = "SELECT id from dbUsers WHERE email='$emailusername' or username='$emailusername' and password='$password' and role_id=".self::ADMIN_ROLE."";
        //checking if the username is available in the table
        $result = $db->pdo->prepare($check_login_sql);
        $result->execute();
        $user_data = $result->fetchAll();
        $count_row = sizeof($user_data);
        
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            return true;
        }
    }
    /*** To get the details in editprofile in user ***/
    public function user_details($id)
    {
        $db = new DBConnection();
        $user_detail_sql = "SELECT * FROM dbUsers 
        WHERE role_id=".self::USER_ROLE."" ;
        $result = $db->pdo->prepare($user_detail_sql);
        $result->execute();
        return $result->fetchAll(); 
        }
    
    public function user_detailsOnId($id)
    {
        $db = new DBConnection();
        $user_sql = "SELECT id, username,email,phone_number FROM dbUsers WHERE id=$id";
        $result = $db->pdo->prepare($user_sql);
        $result->execute();
        return $result->fetchAll(); 
    }
    
    public function update_changes($name, $email, $phone_number, $id)
    {
        $db = new DBConnection();
        $update_sql = "UPDATE dbUsers SET username = '$name', email ='$email' ,phone_number='$phone_number' WHERE id = $id";
        $result = $db->pdo->prepare($update_sql);        
        return $result->execute();
    }
    
    public function delete_user($id)
    {
        $db = new DBConnection();
        $delete_sql = "DELETE FROM dbUsers WHERE id=$id";
        $result = $db->pdo->prepare($delete_sql);
        return $result->execute();
    }
    
    public function status_disable($id)
    {
        $db = new DBConnection();
        $disable_sql = "UPDATE dbUsers SET status = ".self::DISABLE." WHERE id = $id";
        $result = $db->pdo->prepare($disable_sql);
        return $result->execute();
    }
    
    
    public function status_enable($id)
    {
        $db = new DBConnection();

        $enable_sql = "UPDATE dbUsers SET status=".self::ENABLE." WHERE id = $id";
        $result = $db->pdo->prepare($enable_sql);
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
