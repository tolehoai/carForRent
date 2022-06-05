<?php

namespace Tolehoai\CarForRent\Database;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class DatabaseConnection
{
    /*
     * return PDO
     */
    private static ?PDO $conn = null;
    protected static $dotenv;

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        self::$dotenv = $dotenv->load();

        if (self::$conn) {
            return self::$conn;
        }
        $host = $_ENV['HOST'];
        $username = $_ENV['USERNAME'];
        $password = $_ENV['PASSWORD'];
        $database = $_ENV['DATABASE'];

        try {
            self::$conn = new PDO("mysql:host=$host;dbname=$database;port=3336", $username,  $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                            echo "Connected successfully";
        } catch (PDOException $e) {
//                            echo "Connection failed: " . $e->getMessage();
        }
        return self::$conn;
    }
}
