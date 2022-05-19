<?php

use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Controller\SiteController;
use Tolehoai\CarForRent\Database\DatabaseConnection;
error_reporting(E_ALL);
ini_set('display_errors', '1');


require '../vendor/autoload.php';
session_start();
$conn = DatabaseConnection::getConnection();

$app = new Application(dirname(__DIR__));

require "../src/Route/route.php";

$app->run();

