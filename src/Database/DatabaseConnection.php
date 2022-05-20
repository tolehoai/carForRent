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
    private static $conn;
    protected static $dotenv;
    public static function getConnection(): PDO
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        self::$dotenv = $dotenv->load();

        if (!self::$conn) {
            $host = $_ENV['HOST'];
            ;
            $username = $_ENV['USERNAME'];
            $password = $_ENV['PASSWORD'];
            $database = $_ENV['DATABASE'];

            try {
                self::$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Connected successfully";
            } catch (PDOException $e) {
//                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
    public static function beginTransaction()
    {
        self::$conn->beginTransaction();
    }

    public static function commitTransaction()
    {
        self::$conn->commit();
    }

    public static function rollbackTransaction()
    {
        self::$conn->rollBack();
    }
}