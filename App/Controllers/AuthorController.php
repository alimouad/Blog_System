<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reports;
use Core\Auth;

class AuthorController extends Controller
{
    public function index()
    {

        Auth::requireRole("AUTHOR");
        $articles = Article::fetchaAllArticles();
        $categories = Category::getAllCategories();
        $this->render('Author/home', 'authorLayout', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * Validate article data
     */
    public function articles()
    {
        Auth::requireRole("AUTHOR");
        $categories = Category::getAllCategories();

        $data = [
            'title'       => '',
            'content'     => '',
            'author_id'   => $_SESSION['user_id'],
            'category_ids' => [], 
            'errors'      => []
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['title']        = trim($_POST['title'] ?? '');
            $data['content']      = trim($_POST['content'] ?? '');
            $data['category_ids'] = $_POST['category_ids'] ?? []; // Capture the array from the checkboxes

            $data['errors'] = $this->validateInputs($data);

            // Custom validation for categories
            if (empty($data['category_ids'])) {
                $data['errors']['categoryErr'] = "Please select at least one category.";
            }

            if (empty($data['errors'])) {
                $article = new Article(
                    $data['title'],
                    $data['content'],
                    $data['author_id']
                );

                // Pass the category IDs to the save method
                $errors = $article->save($data['category_ids']);

                if (empty($errors)) {
                    $_SESSION['SUCCESS_MESSAGE'] = 'Article added successfully.';
                    header('Location: /author/home');
                    exit;
                }
                $data['errors'] = $errors;
            }
        }

        $this->render('Author/add_article', 'authorLayout', [
            'title'      => 'Manage Articles',
            'data'       => $data,
            'categories' => $categories
        ]);
    }

    public function viewArticles()
    {
        Auth::requireRole("AUTHOR");
        $user_id = (int) $_SESSION["user_id"];
        $articles = Author::getMyArticles($user_id);

        $this->render('Author/articles', 'authorLayout', [
            'title' => 'Manage Articles',
            'articles' => $articles,
        ]);
    }

    public function deleteArticle()
{
    Auth::requireRole("AUTHOR");

    $articleId = $_GET['id'] ?? null; 
    
    $authorId = $_SESSION['user_id']; 

    if ($articleId) {
        if (Author::deleteArticle($articleId, $authorId)) {
            $_SESSION['SUCCESS_MESSAGE'] = 'Article deleted successfully';
        } else {
            $_SESSION['ERROR_MESSAGE'] = 'Permission denied or article not found.';
        }
    }

    header('Location: /author/articles');
    exit;
}

    public function viewComments()
    {
        Auth::requireRole("AUTHOR");
        $user_id = (int) $_SESSION["user_id"];
        $comments = Comment::getAllCommentsById($user_id);
        $this->render('Author/comments', 'authorLayout', [
            'title' => 'Manage Articles',
            'comments' => $comments
        ]);
    }
    public function deleteComment()

    {
        Auth::requireRole("AUTHOR");

        $id = $_GET['id'] ?? null;

        if ($id) {
            if (Comment::deleteComment($id)) {
                $_SESSION['SUCCESS_MESSAGE'] = 'Comment deleted successfully';
            } else {
                $_SESSION['ERROR_MESSAGE'] = 'Failed to delete the comment';
            }
        }

        // 3. Redirect back to the books table
        header('Location: /author/comments');
        exit;
    }


    private function validateInputs(array $post): array
    {
        $errors = [];

        if (empty($post['title'])) {
            $errors['titleErr'] = 'Title of article is required';
        }
        if (empty($post['content']) || strlen($post['content']) < 8) {
            $errors['contentErr'] = 'Content must be at least 8 characters';
        }

        return $errors;
    }
}
