<?php
use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Controller\SiteController;
use Tolehoai\CarForRent\Database\DatabaseConnection;

require '../vendor/autoload.php';

$conn = DatabaseConnection::getConnection();

$app = new Application(dirname(__DIR__));

require "../src/Route/route.php";

$app->run();

