<?php

use Tolehoai\CarForRent\Boostrap\Route;
use Tolehoai\CarForRent\Controller\CarController;
use Tolehoai\CarForRent\Controller\SiteController;
use Tolehoai\CarForRent\Controller\UserApiController;
use Tolehoai\CarForRent\Controller\UserController;
use Tolehoai\CarForRent\Database\DatabaseConnection;

$connection = DatabaseConnection::getConnection();
//$userRepository = new UserRepository();
//$userService = new UserService($userRepository);
//$sessionRepository = new SessionRepository();
//$sessionService = new SessionService($sessionRepository, $userRepository);
//$userValidator = new UserValidator();

Route::get('/', [SiteController::class, 'home']);
Route::get(
    '/login',
    [UserController::class, 'loginAction']
);
Route::post(
    '/login',
    [UserController::class, 'loginAction']
);
Route::get(
    '/register',
    [UserController::class, 'registerAction']
);
Route::post(
    '/register',
    [UserController::class, 'registerAction']
);
Route::post(
    '/logout',
    [UserController::class, 'logout']
);
Route::get('/about', 'about');

Route::get('/404', '404');

Route::post(
    '/api/login',
    [UserApiController::class, 'login']
);

Route::get(
    '/addCar',
    [CarController::class, 'addCar']
);

Route::post(
    '/addCarPost',
    [CarController::class, 'addCarPost']
);
