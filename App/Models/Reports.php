<?php

namespace App\Models;

use Core\Database;
use PDO;


class Reports
{
    protected ?int $id;
    protected int $article_id;
    protected int $author_id;
    protected string $reason;

    public function __construct(
        int $article_id,
        int $author_id,
        string $reason,
        ?int $id = null
    ) {
        $this->id         = $id;
        $this->article_id = $article_id;
        $this->author_id  = $author_id;
        $this->reason    = trim($reason);
    }

    public static function createReport($articleId, $userId, $reason)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO reports (article_id, user_id, reason) VALUES (?, ?, ?)");
        return $stmt->execute([$articleId, $userId, $reason]);
    }

    public static function getArticleReports($userId) {
    $pdo = Database::getConnection();
    $sql = "SELECT article_id, COUNT(*) as count 
            FROM reports 
            WHERE article_id IN (SELECT id FROM articles WHERE author_id = ?)
            GROUP BY article_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR); 
}
}
