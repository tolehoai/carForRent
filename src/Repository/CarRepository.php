<?php

namespace Tolehoai\CarForRent\Repository;

use PDO;
use Tolehoai\CarForRent\Model\Car;
use Tolehoai\CarForRent\Service\DatabaseService;
use Tolehoai\CarForRent\Transfer\CarTransfer;
use Tolehoai\CarForRent\Transformer\CarTransformer;

class CarRepository
{
    private PDO $connection;
    private CarTransformer $carTransformer;

    public function __construct(DatabaseService $databaseService, CarTransformer $carTransformer)
    {
        $this->connection = $databaseService->getConnection();
        $this->carTransformer = $carTransformer;
    }

    public function findAll(int $limit, int $offset): array
    {
        $query = "SELECT * FROM car LIMIT :offset,:limit";
        $statement = $this->connection->prepare($query);
        $statement->bindValue('offset', $offset, PDO::PARAM_INT);
        $statement->bindValue('limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetchAll();

        if (!$row) {
            return [];
        }
        return $row;
    }

    public function save(CarTransfer $car): bool
    {
        try {
            $query = "INSERT INTO car( name, brand, color, img, luggage, doors, passenger, price) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->connection->prepare($query);
            $statement->execute(
                [
                    $car->getName(),
                    $car->getBrand(),
                    $car->getColor(),
                    $car->getImg(),
                    $car->getLuggage(),
                    $car->getDoors(),
                    $car->getPassenger(),
                    $car->getPrice(),
                ]
            );
            return true;
        }catch (\PDOException $e){
            return false;
    }

    }
}