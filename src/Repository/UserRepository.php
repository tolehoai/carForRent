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
        $statement = DatabaseConnection::getConnection()->prepare(
            "INSERT INTO user(user_ID,user_username,user_password) VALUES (?, ?, ?)"
        );
        $statement->execute([
            $user->id,
            $user->name,
            $user->password
        ]);
        return $user;
    }
}
