<?php

namespace Tolehoai\CarForRent\Service;

use PDO;
use Tolehoai\CarForRent\Database\DatabaseConnection;

class DatabaseService
{
    public function getConnection(): PDO
    {
        return DatabaseConnection::getConnection();
    }
}
