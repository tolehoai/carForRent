<?php

namespace Tolehoai\CarForRent\Repository;

use PDO;
use Tolehoai\CarForRent\Database\DatabaseConnection;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Service\DatabaseService;

class UserRepository
{
    private PDO $connection;

    /**
     * @param DatabaseService $databaseService
     */
    public function __construct(DatabaseService $databaseService)
    {
        $this->connection = $databaseService->getConnection();
    }

    public function findByUsername(string $username): ?User
    {
        $query = 'SELECT * FROM user WHERE user_username = ?';
        $statement = $this->connection->prepare($query);
        $statement->execute([$username]);

        $user = new User();
        $row = $statement->fetch();

        if (!$row) {
            return null;
        }
        $user->setId($row['user_ID']);
        $user->setUsername($row['user_username']);
        $user->setPassword($row['user_password']);
        return $user;
    }

    public function save(User $user): User
    {
        $query = 'INSERT INTO user(user_ID,user_username,user_password) VALUES (?, ?, ?)';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            [
            $user->getId(),
            $user->getUsername(),
            $user->getPassword()
            ]
        );
        return $user;
    }

    public function deleteById(string $userId): bool
    {
        $query = 'DELETE FROM `rentcar`.`user` WHERE (`user_ID` = ?);';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            [
            $userId
            ]
        );
        return true;
    }
}
