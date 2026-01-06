<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use Core\Controller;
use Core\Auth;

class AdminController extends Controller
{
    public function home()
    {
        Auth::requireRole("ADMIN");

        $stats = Admin::getDashboardStats();

        $this->render('admin/home', 'adminLayout', [
            'title' => 'Manage Articles',
            'stats' => $stats
        ]);
    }

    public function getUsers()
    {
        Auth::requireRole("ADMIN");
        $users = Admin::getAllUsers();
        $this->render('admin/users', 'adminLayout', [
            'title' => 'Manage Articles',
            'members' => $users
        ]);
    }
    public function deleteUser(){
        Auth::requireRole("ADMIN");
        $id = $_GET['id'] ?? null;

        if ($id) {
            if (Admin::deleteUser($id)) {
                $_SESSION['SUCCESS_MESSAGE'] = 'User deleted successfully';
            } else {
                $_SESSION['ERROR_MESSAGE'] = 'Failed to delete the user';
            }
        }

        // 3. Redirect back to the books table
        header('Location: /admin/users');
        exit;
    }
    public function category()
    {
        Auth::requireRole("ADMIN");
          $data = [
            'name'     => '',
            'description'   => '',
            'author_id' => $_SESSION['user_id'],
            'errors'    => []
        ];
        $categories = Category::getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['name']   = trim($_POST['name'] ?? '');
            $data['description'] = trim($_POST['description'] ?? '');
            $data['errors'] = $this->validateInputs($data);

            if (empty($data['errors'])) {

                $errors = Admin::createCategory($data['name'] ,$data['description']);
                if (empty($errors)) {

                    $_SESSION['SUCCESS_MESSAGE'] = 'Category added successfully.';
                    header('Location: /admin/categories');
                    exit;
                }
                $data['errors'] = $errors;
            }
        }

        // $users = Admin::getAllUsers();
        $this->render('admin/category', 'adminLayout', [
            'title' => 'Manage Articles',
            'categories' => $categories
            // 'members' => $users
        ]);
    }

    public function deleteCategory(){
        Auth::requireRole("ADMIN");

        $id = $_GET['id'] ?? null;

        if ($id) {
            if (Admin::deleteCategory($id)) {
                $_SESSION['SUCCESS_MESSAGE'] = 'Category deleted successfully';
            } else {
                $_SESSION['ERROR_MESSAGE'] = 'Failed to delete the category';
            }
        }

        // 3. Redirect back to the books table
        header('Location: /admin/categories');
        exit;
    }

    private function validateInputs(array $post): array
    {
        $errors = [];

        if (empty($post['name'])) {
            $errors['nameErr'] = 'Name of Category is required';
        }
        if (empty($post['description']) || strlen($post['description']) < 8) {
            $errors['descErr'] = 'Description must be at least 8 characters';
        }

        return $errors;
    }
}
