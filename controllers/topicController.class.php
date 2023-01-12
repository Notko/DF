<?php

class topicController
{
    public PDO $conn;

    public function __construct()
    {
        require_once "config/db.php";
        //$dsn = "mysql:host=lab.uzlabina.cz;dbname=$dbname;port=3306";
        $dsn = "mysql:host=localhost;dbname=$dbname;port=3336";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->conn = new PDO($dsn, $username, $pass, $options);
        } catch (PDOException $e) {
            echo "Nelze se připojit k MySQL: ";
            echo $e->getMessage();
        }
    }

    /**
     *
     * Returns all topics
     * @return array
     *
     */

    public function getAllTopics(): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT df_topics.title, df_topics.id, COUNT(df_posts.topics_id) AS 'postsCount' FROM df_topics LEFT JOIN df_posts ON df_topics.id = df_posts.topics_id GROUP BY df_posts.topics_id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Return name of topic by id
     * @param int $id
     * @return array
     *
     */

    public function getTitleFromID(int $id): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT title FROM df_topics WHERE id = :id");
            $stmt->bindParam('id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }
}