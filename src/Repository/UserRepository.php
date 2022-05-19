<?php

namespace Tolehoai\CarForRent\Repository;

use Tolehoai\CarForRent\Database\DatabaseConnection;
use Tolehoai\CarForRent\Model\User;

class UserRepository
{
    public function findByUsername($userInput)
    {
        $statement = DatabaseConnection::getConnection()->prepare("SELECT * FROM user WHERE user_username = ?");
        $statement->execute([$userInput->username]);

        try {
            $user = new User();
            if ($row = $statement->fetch()) {
//                var_dump($row);
                $user->setId($row['user_ID']);
                $user->setUsername($row['user_username']);
                $user->setPassword($row['user_password']);
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function save(User $user): User
    {

        $statement = DatabaseConnection::getConnection()->prepare("INSERT INTO user(user_ID,user_username,user_password) VALUES (?, ?, ?)");
        $statement->execute([
            $user->id,
            $user->name,
            $user->password
        ]);
        return $user;
    }
}
