<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\CarRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\CarService;

class SiteController extends BaseController
{
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function home()
    {
        $carList = $this->carService->getAllCar();

        return View::renderView(
            'home',
            [
                'name' => 'To Le Hoai',
                'carList' => $carList,

            ]
        );
    }
}
