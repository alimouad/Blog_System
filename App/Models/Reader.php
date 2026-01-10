<?php

namespace App\Models;

use Core\Database;
use PDO;

class Reader
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
        string $role = 'READER',
        ?int $id = null
    ) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public static function getActivityHistory($userId)
    {
        $pdo = Database::getConnection();

        $sql = "SELECT 
                activity_type,
                detail,
                created_at,
                article_title,
                article_id,
                actor_name
            FROM (
                SELECT 
                    'comment' AS activity_type,
                    c.content AS detail,
                    c.created_at,
                    a.title AS article_title,
                    a.id AS article_id,
                    COALESCE(u.full_name, 'Deleted User') AS actor_name
                FROM comments c
                INNER JOIN articles a ON c.article_id = a.id
                LEFT JOIN users u ON c.user_id = u.id
                WHERE c.user_id = ?

                UNION ALL

                SELECT 
                    'like' AS activity_type,
                    'Liked this article' AS detail,
                    l.created_at,
                    a.title AS article_title,
                    a.id AS article_id,
                    COALESCE(u.full_name, 'Deleted User') AS actor_name
                FROM likes l
                INNER JOIN articles a ON l.article_id = a.id
                LEFT JOIN users u ON l.user_id = u.id
                WHERE l.user_id = ?

                UNION ALL

                SELECT 
                    'report' AS activity_type,
                    r.reason AS detail,
                    r.created_at,
                    a.title AS article_title,
                    a.id AS article_id,
                    COALESCE(u.full_name, 'Deleted User') AS actor_name
                FROM reports r
                INNER JOIN articles a ON r.article_id = a.id
                LEFT JOIN users u ON r.user_id = u.id
                WHERE r.user_id = ?
            ) AS activity_history
            ORDER BY created_at DESC
    ";

        $stmt = $pdo->prepare($sql);
        $userIdInt = (int)$userId;
        $stmt->execute([$userIdInt, $userIdInt, $userIdInt]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
