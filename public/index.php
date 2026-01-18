<?php

require_once __DIR__ . '/../vendor/autoload.php';




use app\Helpers\View;
use app\Routes\Router;

$router = new Router();
$router->get('/login','AuthController@index');
$router->get('/admin/dashboard','AdminController@index');
$router->get('/admin/classes/create','ClassController@createClass');
$router->get('/admin/classes/assignement','ClassController@assignement');
$router->get('/admin/classes/assignement/learners','ClassController@assignLearner');
$router->get('/admin/classes','ClassController@index');

$router->get('/admin/sprints','SprintController@index');
$router->get('/admin/sprints/create','SprintController@create');
$router->get('/admin/sprints/view','SprintController@view');

$router->get('/admin/skills','SkillController@index');
$router->get('/admin/skills/create','SkillController@create');

$router->get('/admin/users','UsersController@index');
$router->get('/admin/users/create','UsersController@create');

$router->get('/trainer/dashboard','TrainerController@index');
$router->get('/trainer/briefs/create','BriefController@create');

$router->get('/404','NotFoundController@index');
$router->dispatch();