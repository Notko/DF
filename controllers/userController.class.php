<?php

class userController
{
    public PDO $conn;

    public function __construct()
    {
        require_once "config/db.php";
        $dsn = "mysql:host=lab.uzlabina.cz;dbname=$dbname;port=3306";
        //$dsn = "mysql:host=localhost;dbname=$dbname;port=3336";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->conn = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            echo "Nelze se připojit k MySQL: ";
            echo $e->getMessage();
        }
    }

    public function registerUser($name, $surname, $username, $email, $password, $password_confirm)
    {
        if (!($name && $surname && $username && $email && $password && $password_confirm)) return ['status' => 422, 'message' => 'Prosím vyplňte všechna pole!'];
        if ($password != $password_confirm) return ['status' => 422, 'message' => 'Hesla se neshodují!'];

        try {
            $stmt = $this->conn->prepare('SELECT COUNT(*) AS items FROM df_users WHERE username = :username');
            $stmt->bindParam('username', $username);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            if ($row->items == 0) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                try {
                    $stmt = $this->conn->prepare("INSERT INTO df_users (name, surname, username, email, password_hash) VALUES (:name, :surname, :username, :email, :password_hash)");
                    $stmt->bindParam('name', $name);
                    $stmt->bindParam('surname', $surname);
                    $stmt->bindParam('username', $username);
                    $stmt->bindParam('email', $email);
                    $stmt->bindParam('password_hash', $password);
                    $stmt->execute();
                    $stmt->fetchAll(PDO::FETCH_OBJ);

                    return ['status' => 200];
                } catch (PDOException $e) {
                    return [];
                }
            } else {
                return ['status' => 422, 'message' => 'Uživatel s tímto uživatelským jménem již existuje!'];
            }
        } catch (PDOException $e) {
            return [];
        }
    }
}