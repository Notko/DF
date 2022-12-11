<?php

class postController
{
    public PDO $conn;

    public function __construct()
    {
        require_once "../config/db.php";
        //$dsn = "mysql:host=lab.uzlabina.cz;dbname=$dbname;port=3306";
        $dsn = "mysql:host=localhost;dbname=$dbname;port=3336";
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


    /**
     *
     * Returns all posts
     * @return array
     *
     */
    public function getPosts(): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT df_posts.id, heading, content, date_created, username, title AS 'topic_title' FROM df_posts LEFT JOIN df_users ON df_posts.users_id = df_users.id LEFT JOIN df_topics ON df_posts.topics_id = df_topics.id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Returns one post
     * @param $id int
     * @return array
     *
     */
    public function getPost(int $id): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT heading, content, date_created, username, title AS 'topic_title' FROM df_posts LEFT JOIN df_users ON df_posts.users_id = df_users.id LEFT JOIN df_topics ON df_posts.topics_id = df_topics.id WHERE df_posts.id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }
}