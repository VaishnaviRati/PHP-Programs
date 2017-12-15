<?php
session_start();
require __DIR__.'/vendor/autoload.php';


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'compass');
define('DB_DATABASE', 'company');

$home = new Compassite\Controller\Home();
if($_GET['page']=='home') {
	$home->welcome();
}

$viewObj= new Compassite\Controller\AdminController();
if($_GET['page'] == 'login')
{
$viewObj->login();
}

if($_GET['page'] == 'userInfo')
{
	$viewObj->userView();
}

if($_GET['page']=='edit') {

	$viewObj->userEdit();
}

$userObj=new Compassite\Controller\UserController();
if($_GET['page']=='user_login') {
	$userObj->userLogin();
}

if($_GET['page']=='details') {
	$userObj->userDetails();
}

if($_GET['page']=='register') {
	$userObj->registration();
}

if($_GET['page']=='edit_profile') {
	$userObj->editProfile();
}