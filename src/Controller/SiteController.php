<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\CarRepository;
use Tolehoai\CarForRent\Service\CarService;
use Tolehoai\CarForRent\Transformer\CarTransformer;

class SiteController extends Controller
{
    private CarRepository $carRepository;


    public function __construct(CarRepository $carRepository, CarService $carService, CarTransformer $carTransformer)
    {
        $this->carRepository = $carRepository;
        $this->carService = $carService;

    }

    public function home()
    {
        $carList = $this->carRepository->findAll(15,0);

        return View::renderView(
            'home',
            [
                'name' => 'To Le Hoai',
                'carList' => $carList,
            ]
        );
    }
}
