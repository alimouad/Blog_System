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
    public function save(array $categoryIds = []): array
    {
        try {
            $pdo = Database::getConnection();

            // Start transaction
            $pdo->beginTransaction();

            // 1. Insert the main Article
            $stmt = $pdo->prepare("
            INSERT INTO articles (author_id, title, content)
            VALUES (:author_id, :title, :content)
        ");

            $stmt->execute([
                ':author_id' => $this->author_id,
                ':title'     => $this->title,
                ':content'   => $this->content
            ]);

            $this->id = (int) $pdo->lastInsertId();

            if (!empty($categoryIds)) {
                $junctionStmt = $pdo->prepare("
                INSERT INTO article_category (article_id, category_id)
                VALUES (:article_id, :category_id)
            ");

                foreach ($categoryIds as $categoryId) {
                    $junctionStmt->execute([
                    
                        ':article_id'  => $this->id,
                        ':category_id' => (int) $categoryId
                    ]);
                }
            }
            // Commit all changes
            $pdo->commit();

            return [];
        } catch (PDOException $e) {
            // Rollback on error to keep data consistent
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            return [
                'db' => "Database Error: " . $e->getMessage()
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

    public static function getArticleById($id)
    {

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ? limit 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getCategoryByArticle($id){
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT c.* from categories c INNER JOIN article_category ac on ac.category_id = c.id INNER JOIN articles a on ac.article_id = a.id where a.id = ?;");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
