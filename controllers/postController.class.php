<?php

class postController
{
    public PDO $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
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
            $stmt = $this->conn->prepare("SELECT df_posts.id AS post_id, heading, content, date_created, username, topics_id, title AS 'topic_title' FROM df_posts LEFT JOIN df_users ON df_posts.users_id = df_users.id LEFT JOIN df_topics ON df_posts.topics_id = df_topics.id");
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
            $stmt = $this->conn->prepare("SELECT df_posts.id AS post_id, heading, content, date_created, username, topics_id, title AS 'topic_title' FROM df_posts LEFT JOIN df_users ON df_posts.users_id = df_users.id LEFT JOIN df_topics ON df_posts.topics_id = df_topics.id WHERE df_posts.id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Return all posts based on topic
     * @param int $topic_id
     * @return array
     *
     */

    public function getPostsByTopic(int $topic_id): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT df_posts.id AS post_id, heading, content, date_created, username, topics_id, title AS 'topic_title' FROM df_posts LEFT JOIN df_users ON df_posts.users_id = df_users.id LEFT JOIN df_topics ON df_posts.topics_id = df_topics.id WHERE df_posts.topics_id = :id");
            $stmt->bindParam(':id', $topic_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Add new post
     * @param int $userId
     * @param string $title
     * @param string $content
     * @param int $topicId
     * @return array
     *
     */
    public function addPost(int $userId, string $title, string $content, int $topicId): array
    {
        if (!($userId && $title && $content && $topicId)) return ['status' => 422, 'message' => 'Prosím vyplňte všechna pole!'];

        try {
            $stmt = $this->conn->prepare("INSERT INTO df_posts (heading, content, users_id, topics_id, date_created, date_updated) VALUES (:heading, :content, :users_id, :topics_id, CURRENT_DATE, CURRENT_DATE)");
            $stmt->bindParam('heading', $title);
            $stmt->bindParam('content', $content);
            $stmt->bindParam('users_id', $userId);
            $stmt->bindParam('topics_id', $topicId);
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_OBJ);

            return ['status' => 200];
        } catch (PDOException $e) {
            return ['status' => 500, 'message' => 'Něco se nepovedlo.'];
        }
    }
}