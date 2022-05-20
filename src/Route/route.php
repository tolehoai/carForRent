<?php

use Tolehoai\CarForRent\Boostrap\Route;
use Tolehoai\CarForRent\Controller\SiteController;
use Tolehoai\CarForRent\Controller\UserController;

Route::get('/', [new SiteController(), 'home']);
Route::get('/contact', [new SiteController(), 'contact']);
Route::post('/contact', [new  SiteController(), 'handleContact']);
Route::get('/login', [new UserController(), 'login']);
Route::post('/login', [new  UserController(), 'loginAction']);
Route::get('/register', [new UserController(), 'register']);
Route::post('/register', [new  UserController(), 'handleRegister']);
Route::get('/logout', [new  UserController(), 'handleLogout']);
Route::get('/about', 'about');

Route::get('/404', '404');
