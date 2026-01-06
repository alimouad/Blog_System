<?php
// routes/web.php

$router->get('/', "ReaderController@index");
$router->get('/article/view', "ReaderController@viewArticle");
$router->post('/comments/store', "ReaderController@store");

$router->get('/register', "AuthController@register");
$router->post('/register', "AuthController@register");
$router->get('/login', "AuthController@login");
$router->get('/logout', "AuthController@logout");
$router->post('/login', "AuthController@login");
$router->get('/author/home', "AuthorController@index");
$router->post('/author/add_article', "AuthorController@articles");
$router->get('/author/add_article', "AuthorController@articles");
$router->get('/author/articles', "AuthorController@viewArticles");
$router->get('/author/comments', "AuthorController@viewComments");
$router->get('/author/comments/delete', "AuthorController@deleteComment");

$router->get('/admin/home', "AdminController@home");
$router->get('/admin/categories', "AdminController@category");
$router->post('/admin/categories', "AdminController@category");
$router->get('/admin/users', "AdminController@getUsers");
$router->get('/admin/users/delete', "AdminController@deleteUser");
$router->get('/admin/category/delete', "AdminController@deleteCategory");



