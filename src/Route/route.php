<?php

use Tolehoai\CarForRent\Boostrap\Route;
use Tolehoai\CarForRent\Controller\CarController;
use Tolehoai\CarForRent\Controller\LoginController;
use Tolehoai\CarForRent\Controller\RegisterController;
use Tolehoai\CarForRent\Controller\SiteController;
use Tolehoai\CarForRent\Controller\UserApiController;
use Tolehoai\CarForRent\Database\DatabaseConnection;

$connection = DatabaseConnection::getConnection();


Route::get('/', [SiteController::class, 'home']);
Route::get(
    '/login',
    [LoginController::class, 'loginAction']
);
Route::post(
    '/login',
    [LoginController::class, 'loginAction']
);
Route::get(
    '/register',
    [RegisterController::class, 'registerAction']
);
Route::post(
    '/register',
    [RegisterController::class, 'registerAction']
);
Route::post(
    '/logout',
    [LoginController::class, 'logout']
);

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
    '/addCar',
    [CarController::class, 'addCar']
);
