<?php


use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Controller\SiteController;

require '../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

$app = new Application(dirname(__DIR__));


$app->route->get('/', [new SiteController(), 'home']);
$app->route->get('/contact', [new SiteController(), 'contact']);
$app->route->post('/contact', [new  SiteController(), 'handleContact']);
$app->route->get('/login', 'login');
$app->route->post('/login', function () {
    $txtUsername = $_POST['txtEmail'];
    return 'Handle submit login form ' . $txtUsername;
});
$app->route->get('/about', 'about');

$app->route->get('/404', '404');


$app->run();


