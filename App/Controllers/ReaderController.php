<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
use Core\Auth;

class ReaderController extends Controller
{
    public function index()
    {
        $categories = Category::getAllCategories();
        $articles = Article::fetchaAllArticles();
        $this->render('Reader/home', 'readerLayout', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    public function viewArticle()
    {
        Auth::requireLogin();

        $articleId = $_GET['id'] ?? null;

        if ($articleId) {
            $article = Article::getArticleById($articleId);
            $comments = Comment::getByArticle($articleId);
            $category = Article::getCategoryByArticle($articleId);
            $this->render('Reader/article', 'readerLayout', [
                'article' => $article,
                'comments' => $comments,
                'category' => $category
            ]);
        }
    }

    public function saveComment()
    {
        Auth::requireLogin();

        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'error' => 'Invalid request']);
            exit;
        }

        $articleId = (int) ($_POST['article_id'] ?? 0);
        $content   = trim($_POST['content'] ?? '');

        if ($articleId === 0 || $content === '') {
            echo json_encode(['success' => false, 'error' => 'Invalid input']);
            exit;
        }

        $comment = new Comment(
            $articleId,
            (int) $_SESSION['user_id'],
            $content
        );

        $errors = $comment->save();

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'error' => reset($errors)
            ]);
            exit;
        }

        echo json_encode([
            'success' => true,
            'comment' => [
                'content'    => htmlspecialchars($content),
                'author'     => $_SESSION['user_name'],
                'created_at' => date('Y-m-d H:i')
            ]
        ]);
        exit;
    }


    public function saveLike()
    {
        header('Content-Type: application/json');

        Auth::isLoggedIn();
        $articleId = $_POST['article_id'] ?? null;

        if (!$articleId) {
            echo json_encode(['success' => false, 'error' => 'Missing Article ID']);
            exit;
        }

        $result = Like::toggleLike($articleId, $_SESSION['user_id']);

        echo json_encode($result);
        exit;
    }
}
