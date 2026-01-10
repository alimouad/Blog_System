<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class Category
{
    protected ?int $id;
    protected string $name;
    protected string $description;

    public function __construct(string $name, string $description, ?int $id = null)
    {
        $this->id        = $id;
        $this->name     = trim($name);
        $this->description   = trim($description);
    }

    public static function getAllCategories()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
