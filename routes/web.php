<?php
// routes/web.php

$router->get('/', "ReaderController@index");
$router->get('/register', "AuthController@register");
$router->post('/register', "AuthController@register");
$router->get('/login', "AuthController@login");
$router->post('/login', "AuthController@login");

