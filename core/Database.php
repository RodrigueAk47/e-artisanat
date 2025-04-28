<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            require __DIR__ . '/../config/config.php';
            self::$instance = $pdo;
        }
        return self::$instance;
    }
}