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
            }
                $errMsg = 'Wrong username or password';
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin_PDO/Application/View/AdminView/adminLogin.php';
    }
    
    public function userView()
    {
        $id = $_GET['id'];
        $userIds = $_GET['uid'];
        
        $admin = new Admin();
        $users = $admin->user_details($id);
        
        require '/var/www/html/PHP-Programs/MVC_User_Admin_PDO/Application/View/AdminView/adminView.php';
    }

    public function deleteUser()
    {
        $id = $_POST['deleteUser'];
        //$userIds = $_GET['uid'];
        $admin = new Admin();
        if (isset($_POST['submit'])) {
            $delete = $admin->delete_user($_POST['deleteUser']);
            if ($delete) {
                $deleteMsg = "deleted";
            } 
                $deleteErr = "not deleted";    
        }
        $this->userView();
    }

    public function userEnable()
    {
        $id = $_POST['eUser'];
        // $userIds = $_GET['uid'];
        $admin = new Admin();

        if (isset($_POST['eUser'])) {
            $disable = $admin->status_enable($_POST['eUser']);
        }
        $this->userView(); 
    }
    

    public function userDisable()
    {
        $id = $_POST['dUser'];

        // var_dump($_POST);exit;
        $admin = new Admin();

        if (isset($_POST['dUser'])) {
            $disable = $admin->status_disable($_POST['dUser']);
        }
        
        $this->userView();
    }
    public function userEdit()
    {
        $id = $_GET['id'];
        $userId = $_GET['userid'];
        $admin = new Admin();
        $result = $admin->user_detailsOnId($userId);
        if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);
            if (empty($nameErr) && empty($emailErr) && empty($phoneErr)) {
                $update = $admin->update_changes($name, $email, $phone_number, $uid);
                
                if ($update == TRUE) {
                    header("Location: index.php?page=userInfo");
                } else {
                    $updateMsg = 'Update Failed';
                }
            }
        }
        require '/var/www/html/PHP-Programs/MVC_User_Admin_PDO/Application/View/AdminView/editUsers.php';
    }
    
}
