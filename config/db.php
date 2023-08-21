<?php
$dbname = "dbname";
$username = "username";
$pass = "password";
$host = "localhost";
$dsn = "mysql:host=$host;dbname=$dbname;port=3306";

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $conn = new PDO($dsn, $username, $pass, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
