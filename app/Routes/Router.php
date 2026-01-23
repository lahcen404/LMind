<?php
namespace app\Routes;

use app\Helpers\Middleware;

class Router{

    private array $routes = [];

    public function __construct()
    {
       
    }

     public function get(string $uri, string $action, array $middleware = []){
        $this->routes['GET'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function post(string $uri, string $action, array $middleware = []){
        $this->routes['POST'][$uri] =[
            'action' => $action,
            'middleware' => $middleware
        ] ;
    }

   public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        $uri = str_replace($basePath, '', $uri);
        $uri = ($uri === '' || $uri === '/') ? '/' : $uri;

        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];

            
            if (!empty($route['middleware'])) {
                foreach ($route['middleware'] as $key) {

                    if (!Middleware::handle($key)) {
                        return; 
                    }
                }
            }


            [$controllerName, $methodName] = explode('@', $route['action']);
            $controllerClass = "app\\Controllers\\$controllerName";

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                $controller->$methodName();
            } else {
                die("Controller $controllerClass not found.");
            }
        } else {
            header("Location: /404");
            exit();
        }
    }
};