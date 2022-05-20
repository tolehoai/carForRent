<?php

namespace Tolehoai\CarForRent\Repository;

use Tolehoai\CarForRent\Database\DatabaseConnection;

class SessionRepository
{
    private $connection;
    public function __construct()
    {
        $this->connection = DatabaseConnection::getConnection();
    }

    public function save( $session)
    {
        $statement = $this->connection->prepare("INSERT INTO session(idsession, user_id) VALUES(?, ?)");
        $statement->execute([
            $session->id,
            $session->userId
        ]);
        return $session;
    }

}