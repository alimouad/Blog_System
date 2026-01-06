<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class Admin
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
        string $role = 'ADMIN',
        ?int $id = null
    ) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }


    public static function getAllUsers()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id, full_name, email, role FROM users WHERE role != 'ADMIN'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     public static function deleteUser(int $id){
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        return $stmt->execute([$id]);;
    }


       public static function getDashboardStats()
    {
        $pdo = Database::getConnection();

        $stats = [];
        // Total Books
        $stats['total_articles'] = $pdo->query("SELECT COUNT(*) FROM articles")->fetchColumn();
        $stats['active_members'] = $pdo->query("SELECT COUNT(*) FROM users WHERE role != 'ADMIN'")->fetchColumn();
        $stats['books_comments'] = $pdo->query("SELECT COUNT(*) FROM comments")->fetchColumn();
        return $stats;
    }

    public static function createCategory($name,$description){
        try{
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO categories (name, description)
            VALUES (?, ?)
        ");
        $stmt->execute([$name, $description]);
        return [];
        } catch (PDOException $e) {
            return [
                'db' => $e->getMessage()
            ];
        }
    }
    public static function deleteCategory(int $id){
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM categories WHERE id = ?');
        return $stmt->execute([$id]);;
    }
}