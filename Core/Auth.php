<?php

namespace Core;

use Core\Database;

class Auth
{
    public static function requireLogin()
    {
        // enable the session if there is no session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
    }
    public static function isLoggedIn()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    public static function requireRole(string $requiredRole): void
    {
        self::requireLogin();


        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT role FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$user || strtoupper($user['role']) !== strtoupper($requiredRole)) {
                header("Location: /");
                exit;
            }
        } catch (\PDOException $e) {
            header("Location: /");
            exit;
        }
    }
}
