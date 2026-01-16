<?php

require_once __DIR__ . '/../vendor/autoload.php';




use app\Helpers\View;
use app\Routes\Router;

$router = new Router();
$router->get('/login','AuthController@index');
$router->get('/admin/dashboard','AdminController@index');
$router->get('/admin/classes/create','ClassController@createClass');
$router->get('/admin/classes/assignement','ClassController@assignement');
$router->get('/admin/classes','ClassController@index');
$router->get('/404','NotFoundController@index');
$router->dispatch();