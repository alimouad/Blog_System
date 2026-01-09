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
        $stmt = $pdo->prepare("SELECT * FROM articles a inner join users u on a.author_id = u.id where u.id = ? ");
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
