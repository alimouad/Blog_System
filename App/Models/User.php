<?php

namespace App\Models;

use Core\Database;
use PDO;

class User
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

    public static function getById($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    //REGISTER: Static method to handle user creation
    public static function register($fullname, $email, $password, $role = 'reader')
    {
        $pdo = Database::getConnection();
        $errors = [];

        // 1. Check if email exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $errors['email'] = "Email already exists";
            return $errors;
        }

        // 2. Hash Password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // 3. Insert into Database
        $stmt = $pdo->prepare("
            INSERT INTO users (full_name, email, password, role)
            VALUES (?, ?, ?, ?)
        ");

        if (!$stmt->execute([$fullname, $email, $hashedPassword, $role])) {
            $errors['db'] = "Failed to save user.";
        }

        return $errors;
    }


    public static function login(string $email, string $password): User|false
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userData || !password_verify($password, $userData['password'])) {
            return false;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Store ONLY what you need globally
        $_SESSION['user_id']   = (int) $userData['id'];
        $_SESSION['user_role'] = $userData['role'];
        $_SESSION['user_name'] = $userData['full_name'];

        return new static(
            $userData['full_name'],
            $userData['email'],
            $userData['password'],
            $userData['role'],
            (int) $userData['id']
        );
    }

    /**
     * LOGOUT: Destroys the session
     */
    public static function logout()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
