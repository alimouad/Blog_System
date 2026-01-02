<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, string $action) {
        // Store the route URI in lowercase
        $this->routes['GET'][strtolower($uri)] = $action;
    }

    public function post(string $uri, string $action) {
        // Store the route URI in lowercase
        $this->routes['POST'][strtolower($uri)] = $action;
    }

    public function dispatch() {
        $uri = strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            [$controllerName, $methodName] = explode('@', $this->routes[$method][$uri]);

            $controllerClass = "App\\Controllers\\$controllerName";

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                
                if (method_exists($controller, $methodName)) {
                    return $controller->$methodName();
                }
            }
        }

        $this->abort();
    }

    protected function abort($code = 404) {
        http_response_code($code);
        echo "404 - Page Not Found";
        die();
    }
}