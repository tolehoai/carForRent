<?php

use Tolehoai\CarForRent\Boostrap\Route;
use Tolehoai\CarForRent\Controller\SiteController;

Route::get('/', [new SiteController(), 'home']);
Route::get('/contact', [new SiteController(), 'contact']);
Route::post('/contact', [new  SiteController(), 'handleContact']);
Route::get('/login', 'login');
Route::post('/login', function () {
    $txtUsername = $_POST['txtEmail'];
    return 'Handle submit login form ' . $txtUsername;
});
Route::get('/about', 'about');

Route::get('/404', '404');
