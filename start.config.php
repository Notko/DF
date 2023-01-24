<?php
session_start();
require_once 'config/db.php';

require_once 'controllers/userController.class.php';
$user = new userController($conn);

require_once 'controllers/topicController.class.php';
$topic = new topicController($conn);

require_once 'controllers/postController.class.php';
$post = new postController($conn);

require_once 'controllers/commentController.class.php';
$comment = new commentController($conn);