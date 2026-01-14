<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


use config\DBConnection;

try {
    $db = DBConnection::getInstance()->connectDB();
    echo "db connected successfully";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}