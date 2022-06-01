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


use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


// Instantiate the client.
$s3Client = new S3Client([
    'version' => 'latest',
    'region' => 'ap-southeast-1',
    'credentials' => ['key' => 'AKIAYJ57HRH2HGDYQD7Z', 'secret' => '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']
]);
$bucketName = 'hoaicarforrent';
$key='tolehoai1.jpg';
$file = '/var/www/tolehoai/carForRent/public/assets/images/car_2.jpg';
try {
    $result = $s3Client->putObject([
        'Bucket' => $bucketName,
        'Key' => $key,
        'SourceFile' => $file,
    ]);
    return $result->get('ObjectURL');
} catch (S3Exception $e) {
    return null;
}


?>
