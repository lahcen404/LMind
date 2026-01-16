<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


use config\DBConnection;

use app\Controllers\AdminController;

$controller = new AdminController();
$controller->testBlade();