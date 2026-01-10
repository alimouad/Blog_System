<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $data = [
            'full_name' => '',
            'email'    => '',
            'errors'   => []
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['full_name'] = trim($_POST['full_name'] ?? '');
            $data['email']    = trim($_POST['email'] ?? '');
            $password         = $_POST['password'] ?? '';

            $data['errors'] = $this->validateRegister($_POST);

            if (empty($data['errors'])) {
                $result = User::register($data['full_name'], $data['email'], $password);

                if (empty($result)) {
                    header('Location: /login');
                    exit;
                } else {
                    $data['errors'] = $result;
                }
            }
        }
        $this->render('Auth/register', 'authLayout', [
            'title' => 'Register',
            'data' => $data
        ]);
    }


    public function login()
    {
        $data = [
            'email'  => '',
            'errors' => []
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['email'] = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $data['errors'] = $this->validateLogin($_POST);

            if (empty($data['errors'])) {
                $user = User::login($data['email'], $password);

                if ($user) {
                    $redirect = null;
                    $role= $user->getRole();
                    if ($role == 'ADMIN'){
                        $redirect = '/admin/home';
                    }
                    elseif (($role == 'AUTHOR')){
                        $redirect = '/author/home';
                    }
                    else{
                        $redirect = '/';
                    }
                    header("Location: $redirect");
                    exit;
                } else {
                    $data['errors']['LoginErr'] = 'Invalid email or password';
                }
            }
        }


        $this->render('Auth/login', 'authLayout', [
            'title' => 'Login',
            'data' => $data
        ]);
    }


    public function logout()
    {
        User::logout();
        exit;
    }



    // --- Private Helper Methods ---

    private function validateRegister(array $post): array
    {
        $errors = [];
        // Validating against 'fullname' to match your form/model preference
        if (empty($post['full_name'])) {
            $errors['NameErr'] = 'Full name is required';
        }

        if (empty($post['email']) || !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['EmailErr'] = 'Valid email is required';
        }

        if (empty($post['password']) || strlen($post['password']) < 8) {
            $errors['PasswordErr'] = 'Password must be at least 8 characters';
        }
        if (empty($post['password_confirm']) || strlen($post['password_confirm']) < 8) {
            $errors['PasswordErr'] = 'Password Confirmation must be at least 8 characters';
        }
        if ($post['password_confirm'] !== $post['password']) {
            $errors['PasswordErr'] = "Passwords don't match";
        }
        return $errors;
    }

    private function validateLogin(array $post): array
    {
        $errors = [];
        if (empty($post['email'])) $errors['EmailErr'] = 'Email is required';
        if (empty($post['password'])) $errors['PasswordErr'] = 'Password is required';
        return $errors;
    }
}
