<?php


use Tolehoai\CarForRent\Boostrap\Application;

require '../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

$app = new Application(dirname(__DIR__));


$app->route->get('/', 'home');
$app->route->get('/contact', 'contact');

$app->route->get('/about', 'about');

$app->route->get('/404', '404');


$app->run();


