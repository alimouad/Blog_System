<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class Author
{
    protected ?int $id;
    protected string $fullname;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construct(
        string $fullname,
        string $email,
        string $password,
        string $role = 'AUTHOR',
        ?int $id = null
    ) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public static function getMyArticles($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
        SELECT 
            a.id AS article_id, 
            a.title, 
            a.content, 
            a.created_at, 
            u.full_name AS author_name,
            COUNT(r.id) AS report_count
        FROM articles a
        INNER JOIN users u ON a.author_id = u.id
        LEFT JOIN reports r ON a.id = r.article_id
        WHERE u.id = ?
        GROUP BY a.id
    ");

        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public static function deleteArticle($articleId, $authorId)
    {
        try {
            $pdo = Database::getConnection();

            $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :article_id AND author_id = :author_id");

            $stmt->execute([
                ':article_id' => (int)$articleId,
                ':author_id'  => (int)$authorId
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
