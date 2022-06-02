<?php

namespace Tolehoai\CarForRent\Repository;

use PDO;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Service\DatabaseService;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;
use Tolehoai\CarForRent\Transformer\UserTransformer;

class UserRepository
{
    private PDO $connection;
    private UserTransformer $userTransformer;

    /**
     * @param DatabaseService $databaseService
     */
    public function __construct(DatabaseService $databaseService, UserTransformer $userTransformer)
    {
        $this->connection = $databaseService->getConnection();
        $this->userTransformer = $userTransformer;
    }

    public function findByUsername(string $username): ?User
    {
        $query = 'SELECT * FROM user WHERE username = ?';
        $statement = $this->connection->prepare($query);
        $statement->execute([$username]);

        $user = new User();
        $row = $statement->fetch();

        if (!$row) {
            return null;
        }
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);

        return $user;
    }

    public function save(RegisterTransfer $user): RegisterTransfer
    {
        $query = 'INSERT INTO user(username,password) VALUES (?, ?)';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            [
                $user->getUsername(),
                $user->getPassword(),
            ]
        );
        return $user;
    }

    public function deleteById(string $userId): bool
    {
        $query = 'DELETE FROM `rentcar`.`user` WHERE (`id` = ?);';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            [
                $userId
            ]
        );
        return true;
    }

    public function reactionLike(string $type)
    {
        $query = 'UPDATE reaction SET `like`=(`like`+1) WHERE `id` = 1';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            []
        );
        return (int)$type+1;
    }
    public function reactionDislike(string $type)
    {
        $query = 'UPDATE reaction SET `dislike`=(`dislike`+1) WHERE `id` = 1';
        $statement = $this->connection->prepare($query);
        $statement->execute(
            []
        );
        return (int)$type+1;
    }

    public function getUserReaction(){
        $query = 'SELECT * FROM reaction WHERE id = ?';
        $statement = $this->connection->prepare($query);
        $statement->execute([1]);
        return $statement->fetch();
    }
}
