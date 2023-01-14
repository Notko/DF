<?php

class userController
{
    public PDO $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }


    /**
     *
     * Register user
     * @param string $name
     * @param string $surname
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $password_confirm
     * @return array
     *
     */
    public function registerUser(string $name, string $surname, string $username, string $email, string $password, string $password_confirm): array
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
                    return ['status' => 500];
                }
            } else {
                return ['status' => 422, 'message' => 'Uživatel s tímto uživatelským jménem již existuje!'];
            }
        } catch (PDOException $e) {
            return ['status' => 500];
        }
    }


    /**
     *
     * Login user
     * @param string $username
     * @param string $password
     * @return array
     *
     */
    public function loginUser(string $username, string $password): array
    {
        if (!($username && $password)) return ['status' => 422, 'message' => 'Prosím vyplňte všechna pole!'];

        try {
            $stmt = $this->conn->prepare("SELECT id, password_hash, username FROM df_users WHERE username = :username");
            $stmt->bindParam('username', $username);
            $stmt->execute();

            $userdata = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$userdata || !password_verify($password, $userdata->password_hash)) {
                return ['status' => 403, 'message' => 'Chybné přihlašovací údaje!'];
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $userdata->id;
                return ['status' => 200];
            }

        } catch (PDOException $e) {
            return ['status' => 500];
        }
    }

    /**
     *
     * Logout user
     *
     */
    public function logoutUser()
    {
        session_destroy();
        session_unset();
        unset($_SESSION['username']);
        unset($_SESSION['userID']);
        header('Location: index.php');
        exit();
    }
}