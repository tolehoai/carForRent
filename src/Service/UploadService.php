<?php

namespace Tolehoai\CarForRent\Service;

use Aws\S3\S3Client;
use Dotenv\Dotenv;
use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Transfer\CarTransfer;

class UploadService
{
    protected static $dotenv;

    public function __construct(
        CarTransfer $carTransfer
    )
    {
        $this->carTransfer = $carTransfer;
    }

    public function uploadImage($file)
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        self::$dotenv = $dotenv->load();
        $region = $_ENV['REGION'];
        $key = $_ENV['S3_KEY'];
        $secret = $_ENV['S3_SECRET_KEY'];
        $bucketName = $_ENV['BUCKET_NAME'];
        $path = Application::$ROOT_DIR . '/public/upload/';
        $filename = md5(date('Y-m-d H:i:s:u')) . $file["name"];
        if (move_uploaded_file($file["tmp_name"], $path . $filename)) {

            // Instantiate the client.
            $s3Client = new S3Client([
                'version' => 'latest',
                'region' => $region,
                'credentials' => ['key' => $key, 'secret' => $secret]
            ]);

            $file_Path = $path . $filename;
            $key = 'resorce/'.basename($file_Path);
            try {
                $result = $s3Client->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $key,
                    'SourceFile' => $file_Path,
                ]);
                unlink($path . $filename);
                $imgUrl = $result->get('ObjectURL');
                $this->carTransfer->setImg($imgUrl);
            } catch (S3Exception $e) {
                return null;
            }
        }
    }
}