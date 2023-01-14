<?php
$dbname = "brauemi";
$username = "brauemi";
$pass = "brauemi3";
$dsn = "mysql:host=lab.uzlabina.cz;dbname=$dbname;port=3306";
//$dsn = "mysql:host=localhost;dbname=$dbname;port=3336";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $conn = new PDO($dsn, $username, $pass, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}