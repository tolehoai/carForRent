<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\CarRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\CarService;

class SiteController extends BaseController
{
    private CarRepository $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function home()
    {
        $carList = $this->carRepository->findAll(50, 0);

        return View::renderView(
            'home',
            [
                'name' => 'To Le Hoai',
                'carList' => $carList,

            ]
        );
    }
}
