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

    public function save(Session $session): bool|Session
    {
        try {
            $query = 'INSERT INTO session(idsession, user_id) VALUES(?, ?)';
            $statement = $this->connection->prepare($query);
            $statement->execute(
                [
                $session->id,
                $session->userId
                ]
            );
            return $session;
        }catch (\Exception){
            return false;
        }

    }

    public function findById($id): Session|bool
    {
        $statement = $this->connection->prepare("SELECT idsession, user_id FROM session WHERE idsession = '$id' ");
        $statement->execute();

        try {
            $session = new Session();
            $row = $statement->fetch();
            if (!$row) {
                return false;

            }
            $session->id = $row['idsession'];
            $session->userId = $row['user_id'];
            return $session;
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById($id): bool
    {
        $query = 'DELETE FROM session WHERE idsession = ? ';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            [
            $id
            ]
        );
        $row = $statement->rowCount();;
        if ($row>0) {
            return true;
        }
        return false;
    }


}