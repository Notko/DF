<?php

class topicController
{
    public PDO $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
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