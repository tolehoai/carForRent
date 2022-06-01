<?php

namespace Tolehoai\CarForRent\Repository;

use Tolehoai\CarForRent\Service\DatabaseService;

class RegisterRepository
{
    private $connection;

    /**
     * @param DatabaseService $databaseService
     */
    public function __construct(DatabaseService $databaseService)
    {
        $this->connection = $databaseService->getConnection();
    }
}