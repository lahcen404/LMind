<?php


require_once __DIR__ . '/../vendor/autoload.php';



$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


use app\Helpers\View;
use app\Routes\Router;

$router = new Router();

$router->get('/','HomeController@index');

$router->get('/login','AuthController@index');
$router->get('/admin/dashboard','AdminController@index');


$router->get('/admin/classes', 'ClassController@index');
$router->get('/admin/classes/create', 'ClassController@createClass');
$router->post('/admin/classes/create', 'ClassController@store');
$router->get('/admin/classes/edit', 'ClassController@edit');
$router->post('/admin/classes/update', 'ClassController@update');
$router->get('/admin/classes/delete', 'ClassController@delete');

$router->get('/admin/sprints','SprintController@index');
$router->get('/admin/sprints/create','SprintController@create');
$router->get('/admin/sprints/view','SprintController@view');

$router->get('/admin/skills','SkillController@index');
$router->get('/admin/skills/create','SkillController@create');

$router->get('/admin/users','UsersController@index');
$router->get('/admin/users/create','UsersController@create');

$router->get('/trainer/dashboard','TrainerController@index');
$router->get('/trainer/briefs','BriefController@index');
$router->get('/trainer/briefs/skills','BriefController@linkSkills');
$router->get('/trainer/briefs/create','BriefController@create');
$router->get('/trainer/briefs/details','BriefController@details');

$router->get('/trainer/evaluations','EvaluationController@index');
$router->get('/trainer/evaluations/create','EvaluationController@create');

$router->get('/404','NotFoundController@index');

$router->post('/login','AuthController@login');
$router->post('/admin/users/create','UsersController@store');
$router->get('/admin/users/delete','UsersController@delete');

$router->get('/admin/users/edit','UsersController@edit');
$router->post('/admin/users/update','UsersController@update');

$router->get('/logout','AuthController@logout');
$router->dispatch();