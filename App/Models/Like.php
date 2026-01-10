<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class Like
{
    protected ?int $id;
    protected int $article_id;
    protected int $author_id;

    public function __construct(
        int $article_id,
        int $author_id,
        ?int $id = null
    ) {
        $this->id         = $id;
        $this->article_id = $article_id;
        $this->author_id  = $author_id;
    }
    public static function toggleLike($articleId, $userId)
{
    $pdo = Database::getConnection();
    
    // 1. Check if the like already exists
    $stmt = $pdo->prepare("SELECT id FROM likes WHERE article_id = ? AND user_id = ?");
    $stmt->execute([$articleId, $userId]);
    $existingLike = $stmt->fetch();

    if ($existingLike) {
        // 2. If exists, unlike (Delete)
        $delete = $pdo->prepare("DELETE FROM likes WHERE article_id = ? AND user_id = ?");
        $delete->execute([$articleId, $userId]);
        $isLiked = false;
    } else {
        // 3. If not exists, like (Insert)
        $insert = $pdo->prepare("INSERT INTO likes (article_id, user_id) VALUES (?, ?)");
        $insert->execute([$articleId, $userId]);
        $isLiked = true;
    }

    // 4. Get the updated total count
    $countStmt = $pdo->prepare("SELECT COUNT(*) as total FROM likes WHERE article_id = ?");
    $countStmt->execute([$articleId]);
    $newCount = $countStmt->fetchColumn();

    return [
        'success' => true,
        'isLiked' => $isLiked,
        'newLikeCount' => $newCount
    ];
}
}