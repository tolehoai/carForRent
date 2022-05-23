<?php

namespace Tolehoai\CarForRent\Repository;

use Tolehoai\CarForRent\Database\DatabaseConnection;
use Tolehoai\CarForRent\Model\Session;

class SessionRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = DatabaseConnection::getConnection();
    }

    public function save(Session $session): Session
    {
        $statement = $this->connection->prepare("INSERT INTO session(idsession, user_id) VALUES(?, ?)");
        $statement->execute([
            $session->id,
            $session->userId
        ]);
        return $session;
    }

    public function findById($id): Session
    {
        $statement = $this->connection->prepare("SELECT idsession, user_id FROM session WHERE idsession = '$id' ");
        $statement->execute();

        try {
            $session = new Session();
            if ($row = $statement->fetch()) {
                $session->id = $row['id'];
                $session->userId = $row['user_id'];
            }
            return $session;
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById($id): void
    {
        $statement = $this->connection->prepare("DELETE FROM session WHERE idsession = '$id' ");
        $statement->execute();
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM session");
    }

}