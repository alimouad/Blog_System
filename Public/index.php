<?php

require_once __DIR__ . '/../bootstrap/autoload.php';


use Core\Router;

$router = new Router();

require_once __DIR__ . '/../routes/web.php';

$router->dispatch();