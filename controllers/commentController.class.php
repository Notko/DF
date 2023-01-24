<?php

class commentController{
    public PDO $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }

    /**
     *
     * Returns main comments
     * @param $postId int
     * @return array
     *
     */
    public function getComments(int $postId): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT df_comments.*, df_users.username FROM df_comments LEFT JOIN df_users ON df_comments.users_id = df_users.id WHERE comments_id IS NULL AND posts_id = :id");
            $stmt->bindParam(':id', $postId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Returns replies on comment
     * @param $commentId int
     * @return array
     *
     */
    public function getReplies(int $commentId): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM df_comments LEFT JOIN df_users ON df_comments.users_id = df_users.id WHERE comments_id = :id");
            $stmt->bindParam(':id', $commentId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Returns count of comments on post
     * @param $postId int
     * @return array|string
     *
     */
    public function getCommentCount(int $postId): array|string
    {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(id) AS comment_count FROM df_comments WHERE posts_id = :id");
            $stmt->bindParam(':id', $postId);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $response[0]->comment_count;
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     *
     * Returns count of replies on comment
     * @param $commentId int
     * @return array|string
     *
     */
    public function getRepliesCount(int $commentId): array|string
    {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(id) AS replies_count FROM df_comments WHERE comments_id = :id");
            $stmt->bindParam(':id', $commentId);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $response[0]->replies_count;
        } catch (PDOException $e) {
            return [];
        }
    }
}