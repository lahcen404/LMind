<?php

require_once __DIR__ . '/../vendor/autoload.php';




use app\Helpers\View;
use app\Routes\Router;

$router = new Router();
$router->get('/login','AuthController@index');
$router->get('/404','NotFoundController@index');
$router->dispatch();