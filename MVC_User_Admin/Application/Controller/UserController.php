<?php
namespace Compassite\Controller;
use Compassite\Model\User;
use Compassite\Model\validation;

class UserController
{
    
    public function userLogin()
    {
        $user = new User();
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            $login = $user->check_login($emailusername, $password);
            if ($login) {
                header("Location: index.php?page=details");
            } else {
                echo 'Wrong username or password';
            }
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/userLogin.php';
    }
    
    public function userDetails()
    {
        $user = new User();
        $id   = $_SESSION['id'];
        /*if (!$user->get_session()) {
        header("Location: index.php?page=user_login");
        }
        
        if (isset($_GET['q'])) {
        $user->user_logout();
        header("Location: index.php?page=user_login");
        }*/
        include '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/userView.php';
    }
    
    public function registration()
    {
        $user = new User();
        // Checking for user logged in or not
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            if ((empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passErr))) {
                $register = $user->reg_user($name, $username, $password, $email, $phone_number, $role, $status);
                
                if ($register) {
                    header("Location: index.php?page=user_login&&msg=registered successfully");
                } else {
                    echo 'Registration failed. Email or Username already exits please try again';
                }
            }
        }
        include '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/registration.php';
        
    }
    
    public function editProfile()
    {
        $id = $_GET['id'];
        $user = new User();
        $userInfo = $user->details($id);
        
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            if (empty($nameErr) && empty($emailErr) && empty($phoneErr)) {
                $update = $user->update_changes($name, $email, $phone_number, $id);
                
                if ($update == TRUE) {
                    header("Location: index.php?page=details&&msg=update successfully");
                } else {
                    echo 'Update Failed';
                }
            }
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/editprofile.php';
        
    }
    
    
}
