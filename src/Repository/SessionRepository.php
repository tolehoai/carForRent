<?php

namespace Tolehoai\CarForRent\Repository;

use PDO;
use Tolehoai\CarForRent\Model\Session;
use Tolehoai\CarForRent\Service\DatabaseService;

class SessionRepository
{
    private PDO $connection;

    public function __construct(DatabaseService $databaseService)
    {
        $this->connection = $databaseService->getConnection();
    }

    public function save(Session $session)
    {
        try {
            $query = 'INSERT INTO session(idsession, user_id) VALUES(?, ?)';
            $statement = $this->connection->prepare($query);
            $statement->execute(
                [
                    $session->getId(),
                    $session->getUserId()
                ]
            );
            return $session;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function findById($id)
    {
        $statement = $this->connection->prepare("SELECT idsession, user_id FROM session WHERE idsession = '$id' ");
        $statement->execute();

        try {
            $session = new Session();
            $row = $statement->fetch();
            if (!$row) {
                return false;
            }
            $session->setId($row['idsession']);
            $session->setUserId($row['user_id']);
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
        if ($row > 0) {
            return true;
        }
        return false;
    }
}
