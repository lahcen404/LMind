<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use app\Routes\Router;

$router = new Router();

// auth
$router->get('/login', 'AuthController@index', ['guest']);
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

// admin
$router->get('/admin/dashboard', 'AdminController@index', ['auth', 'admin']);

// classes
$router->get('/admin/classes', 'ClassController@index', ['auth', 'admin']);
$router->get('/admin/classes/create', 'ClassController@createClass', ['auth', 'admin']);
$router->post('/admin/classes/create', 'ClassController@store', ['auth', 'admin']);
$router->get('/admin/classes/edit', 'ClassController@edit', ['auth', 'admin']);
$router->post('/admin/classes/update', 'ClassController@update', ['auth', 'admin']);
$router->get('/admin/classes/delete', 'ClassController@delete', ['auth', 'admin']);
$router->get('/admin/classes/assignment', 'ClassController@assignment', ['auth', 'admin']);
$router->get('/admin/classes/assignement', 'ClassController@assignement', ['auth', 'admin']);
$router->get('/admin/classes/enroll', 'ClassController@assignStudents', ['auth', 'admin']);
$router->get('/admin/classes/assign-action', 'ClassController@assign', ['auth', 'admin']);
$router->get('/admin/classes/unassign-action', 'ClassController@unassign', ['auth', 'admin']); 

// sprints
$router->get('/admin/sprints', 'SprintController@index', ['auth', 'admin']);
$router->get('/admin/sprints/create', 'SprintController@create', ['auth', 'admin']);
$router->post('/admin/sprints/create', 'SprintController@store', ['auth', 'admin']);
$router->get('/admin/sprints/view', 'SprintController@view', ['auth', 'admin']);
$router->get('/admin/sprints/edit', 'SprintController@edit', ['auth', 'admin']);
$router->post('/admin/sprints/update', 'SprintController@update', ['auth', 'admin']);
$router->get('/admin/sprints/delete', 'SprintController@delete', ['auth', 'admin']);

// skills
$router->get('/admin/skills', 'SkillController@index', ['auth', 'admin']);
$router->get('/admin/skills/create', 'SkillController@create', ['auth', 'admin']);
$router->post('/admin/skills/create', 'SkillController@store', ['auth', 'admin']);
$router->get('/admin/skills/edit', 'SkillController@edit', ['auth', 'admin']);
$router->post('/admin/skills/update', 'SkillController@update', ['auth', 'admin']);
$router->get('/admin/skills/delete', 'SkillController@delete', ['auth', 'admin']);

// users
$router->get('/admin/users', 'UsersController@index', ['auth', 'admin']);
$router->get('/admin/users/create', 'UsersController@create', ['auth', 'admin']);
$router->post('/admin/users/create', 'UsersController@store', ['auth', 'admin']);
$router->get('/admin/users/edit', 'UsersController@edit', ['auth', 'admin']);
$router->post('/admin/users/update', 'UsersController@update', ['auth', 'admin']);
$router->get('/admin/users/delete', 'UsersController@delete', ['auth', 'admin']);

// trainer
$router->get('/trainer/dashboard', 'TrainerController@index', ['auth', 'trainer']);

// briefs
$router->get('/trainer/briefs', 'BriefController@index', ['auth', 'trainer']);
$router->get('/trainer/briefs/create', 'BriefController@create', ['auth', 'trainer']);
$router->post('/trainer/briefs/store', 'BriefController@store', ['auth', 'trainer']);
$router->get('/trainer/briefs/details', 'BriefController@details', ['auth', 'trainer']);
$router->get('/trainer/briefs/edit', 'BriefController@edit', ['auth', 'trainer']);
$router->post('/trainer/briefs/update', 'BriefController@update', ['auth', 'trainer']);
$router->get('/trainer/briefs/delete', 'BriefController@delete', ['auth', 'trainer']);
$router->get('/trainer/briefs/skills', 'BriefController@linkSkills', ['auth', 'trainer']);
$router->post('/trainer/briefs/skills/sync', 'BriefController@syncSkills', ['auth', 'trainer']);

// evaluations
$router->get('/trainer/evaluations', 'EvaluationController@index', ['auth', 'trainer']);
$router->get('/trainer/evaluations/create', 'EvaluationController@create', ['auth', 'trainer']);

// system
$router->get('/', 'HomeController@index');
$router->get('/404', 'NotFoundController@index');

$router->dispatch();