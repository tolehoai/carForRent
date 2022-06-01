<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Repository\CarRepository;

class CarService
{
    private CarRepository $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getCar()
    {
        $carList = $this->carRepository->getAllCar();
        if (!$carList) {
            return false;
        }
        return $carList;
    }
}