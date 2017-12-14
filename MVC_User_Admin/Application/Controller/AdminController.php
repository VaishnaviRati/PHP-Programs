<?php
namespace Compassite\Controller;

use Compassite\Model\Admin;
use Compassite\Model\validation;
class AdminController
{
    public function login()
    {
        $admin = new Admin();
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            $login = $admin->check_login($emailusername, $password);
            if ($login) {
                header("Location: index.php?page=userInfo");
            } else {
                echo 'Wrong username or password';
            }
            
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/adminLogin.php';
    }
    
    public function userView()
    {
        $id = $_GET['id'];
        $userIds = $_GET['uid'];
        
        $admin = new Admin();
        $users = $admin->user_details($id);
        if (isset($_POST['submit'])) {
            $delete = $admin->delete_user($_POST['deleteUser']);
            if ($delete) {
                echo "deleted";
            } else {
                echo " not deleted";
            }
        }
        if (isset($_REQUEST['dsubmit'])) {
            extract($_REQUEST);
            $disable = $admin->status_disable($_POST['dUser']);
            if ($disable == TRUE) {
                
            }
        }
        
        if (isset($_REQUEST['esubmit'])) {
            extract($_REQUEST);
            $disable = $admin->status_enable($_POST['eUser']);
            if ($disable == TRUE) {
            }
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/adminView.php';
    }
    
    public function userEdit()
    {
        $id = $_GET['id'];
        $userId = $_GET['userid'];
        $admin  = new Admin();
        $result = $admin->user_detailsOnId($userId);
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            if (empty($nameErr) && empty($emailErr) && empty($phoneErr)) {
                $update = $admin->update_changes($name, $email, $phone_number, $uid);
                
                if ($update == TRUE) {
                    header("Location: index.php?page=userInfo");
                } else {
                    echo 'Update Failed';
                }
            }
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin/Application/View/editUsers.php';
    }
    
}
