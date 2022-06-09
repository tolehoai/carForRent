<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Model\Car;
use Tolehoai\CarForRent\Repository\CarRepository;
use Tolehoai\CarForRent\Transfer\CarTransfer;
use Tolehoai\CarForRent\Transformer\CarTransformer;

class CarService
{
    private CarRepository $carRepository;
    private CarTransformer $carTransformer;

    public function __construct(CarRepository $carRepository, CarTransformer $carTransformer)
    {
        $this->carRepository = $carRepository;
        $this->carTransformer = $carTransformer;
    }

    public function getAllCar()
    {
        $results = $this->carRepository->findAll(50, 0);
        $carList = [];
        foreach ($results as $result) {
            $car = new Car();
            $car->setId($result['id']);
            $car->setBrand($result['brand']);
            $car->setColor($result['color']);
            $car->setName($result['name']);
            $car->setImg($result['img']);
            $car->setLuggage($result['luggage']);
            $car->setDoors($result['doors']);
            $car->setPrice($result['price']);
            $car->setPassenger($result['passenger']);

            $carTransformer = $this->carTransformer->transform($car);
            array_push($carList, $carTransformer);

        }
        return $carList;
    }
}