<?php

namespace Tolehoai\CarForRent\Database;

use PDO;
use PDOException;

class DatabaseConnection
{
    /*
     * return PDO
     */
    private static $conn;

    public static function getConnection(): PDO
    {
        if (!self::$conn) {
            $host = 'localhost';
            $username = 'carrent';
            $password = 'Tolehoai123!@#';
            $database = 'rentcar';

            try {
                self::$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}
