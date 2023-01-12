<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controllers/userController.class.php';
$user = new userController();
$user->logoutUser();
exit();