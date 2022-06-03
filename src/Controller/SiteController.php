<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\CarRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\CarService;

class SiteController extends Controller
{
    private CarRepository $carRepository;
    private UserRepository $userRepository;

    public function __construct(CarRepository $carRepository, CarService $carService, UserRepository $userRepository)
    {
        $this->carRepository = $carRepository;
        $this->carService = $carService;
        $this->userRepository = $userRepository;
    }

    public function home()
    {
        $carList = $this->carRepository->findAll(50, 0);
        $reaction = $this->userRepository->getUserReaction();
        return View::renderView(
            'home',
            [
                'name' => 'To Le Hoai',
                'carList' => $carList,
                'reaction' => $reaction,
            ]
        );
    }
}
