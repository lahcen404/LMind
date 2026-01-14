<?php

namespace config; 

use PDO;
use PDOException;
use Dotenv\Dotenv; 

class DBConnection
{
    private static ?DBConnection $instance = null; 
    private ?PDO $connection = null;

    private function __construct() 
    {
        
    }

    public static function getInstance(): DBConnection
    {
        if (self::$instance === null) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    public function connectDB(): PDO
    {
        if ($this->connection === null) {
            try {
                
                $dsn = "pgsql:host=" . $_ENV['DB_HOST'] . ";port=" . ($_ENV['DB_PORT'] ?? '5432') . ";dbname=" . $_ENV['DB_NAME'];
                
                $this->connection = new PDO(
                    $dsn,
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS']
                );

                // echo "Connected DB successfully !!!";
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return $this->connection;
    }

    private function __clone() {}
    public function __wakeup() {
        throw new \Exception("Cannot unserialize");
    }
}