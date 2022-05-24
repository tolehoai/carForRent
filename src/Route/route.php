<?php

use Tolehoai\CarForRent\Boostrap\Route;
use Tolehoai\CarForRent\Controller\SiteController;
use Tolehoai\CarForRent\Controller\UserController;
use Tolehoai\CarForRent\Database\DatabaseConnection;

$connection = DatabaseConnection::getConnection();
//$userRepository = new UserRepository();
//$userService = new UserService($userRepository);
//$sessionRepository = new SessionRepository();
//$sessionService = new SessionService($sessionRepository, $userRepository);
//$userValidator = new UserValidator();

Route::get('/', [SiteController::class, 'home']);
Route::get('/contact', [new SiteController(), 'contact']);
Route::post('/contact', [new  SiteController(), 'handleContact']);
Route::get(
    '/login',
    [UserController::class, 'login']
);
Route::post(
    '/login',
    [UserController::class, 'loginAction']
);
Route::get(
    '/register',
    [UserController::class, 'register']
);
Route::post(
    '/register',
    [UserController::class, 'handleRegister']
);
Route::post(
    '/logout',
    [UserController::class, 'logout']
);
Route::get('/about', 'about');

Route::get('/404', '404');
