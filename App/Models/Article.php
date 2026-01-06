<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class Article
{
    protected ?int $id;
    protected string $title;
    protected string $content;
    protected int $author_id;

    public function __construct(string $title, string $content, int $author_id, ?int $id = null)
    {
        $this->id        = $id;
        $this->title     = trim($title);
        $this->content   = trim($content);
        $this->author_id = $author_id;
    }

    /**
     * Save article to database
     */
    public function save(): array
    {
        try {
            $pdo = Database::getConnection();

            $stmt = $pdo->prepare("
            INSERT INTO articles (author_id , title , content)
            VALUES (:author_id, :title, :content)
        ");

            $stmt->execute([
                ':author_id' => $this->author_id,
                ':title'     => $this->title,
                ':content'   => $this->content

            ]);

            $this->id = (int) $pdo->lastInsertId();

            return [];
        } catch (PDOException $e) {
            return [
                'db' => $e->getMessage()
            ];
        }
    }


    /**
     * Fetch all books
     */
    public static function fetchaAllArticles()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getArticleById($id) {

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ? limit 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        
}
