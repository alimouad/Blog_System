<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class Comment
{
    protected ?int $id;
    protected int $article_id;
    protected int $author_id;
    protected string $content;

    public function __construct(
        int $article_id,
        int $author_id,
        string $content,
        ?int $id = null
    ) {
        $this->id         = $id;
        $this->article_id = $article_id;
        $this->author_id  = $author_id;
        $this->content    = trim($content);
    }


    public function validate(): array
    {
        $errors = [];

        if (empty($this->content)) {
            $errors['content'] = 'Comment cannot be empty.';
        } elseif (strlen($this->content) < 3) {
            $errors['content'] = 'Comment must be at least 3 characters.';
        }
        return $errors;
    }

    /* =========================
       Save comment
    ========================== */
    public function save(): array
    {
        $errors = $this->validate();
        if (!empty($errors)) {
            return $errors;
        }

        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("
                INSERT INTO comments (article_id, user_id, content)
                VALUES (:article_id, :user_id, :content)
            ");

            $stmt->execute([
                ':article_id' => $this->article_id,
                ':user_id'  => $this->author_id,
                ':content'    => $this->content
            ]);

            $this->id = (int) $pdo->lastInsertId();

            return [];
        } catch (PDOException $e) {
            return [
                'db' => 'Failed to add comment. Please try again.'
            ];
        }
    }

    //=========================
    public static function getByArticle(int $article_id): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            SELECT c.*, u.full_name AS author_name 
            FROM comments c
            JOIN users u ON u.id = c.user_id
            WHERE c.article_id = ?
            ORDER BY c.created_at DESC
        ");

        $stmt->execute([$article_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // gets comments in articles created by an author----------
    public static function getAllCommentsById($user_id){
        $pdo =  Database::getConnection();
        $stmt = $pdo->prepare("
            select c.*  from comments c INNER JOIN articles a on c.article_id = a.id INNER JOIN users u on a.author_id = u.id WHERE u.id = ?;
        ");

        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    /* =========================
       Delete comment
    ========================== */
    public static function deleteComment(int $id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM comments WHERE id = ?');
        return $stmt->execute([$id]);;
    }
}
