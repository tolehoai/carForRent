<?php

namespace Tolehoai\CarForRent\Service;

use Aws\S3\S3Client;
use Dotenv\Dotenv;
use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Transfer\CarTransfer;

class UploadService
{
    protected static $dotenv;
    private string $region;
    private string $key;
    private string $secret;
    private string $bucketName;
    private string $path;
    private string $filename;
    private CarTransfer $carTransfer;

    public function __construct(
        CarTransfer $carTransfer
    ) {
      $this->carTransfer = $carTransfer;
    }

    /**
     * @return mixed
     */
    public static function getDotenv()
    {
        return self::$dotenv;
    }

    public static function setDotenv($dotenv): void
    {
        self::$dotenv = $dotenv;
    }

    public function uploadImage($file)
    {
        $this->getEnvData();
        $this->setFilename($this->generateFileName($file));
        if (move_uploaded_file($file["tmp_name"], $this->getPath() . $this->getFilename())) {
            $s3Client = $this->createS3Client('latest', $this->getRegion(), $this->getKey(), $this->getSecret());
            $file_Path = $this->getPath() . $this->getFilename();
            $this->setKey('resorce/' . basename($file_Path));
            return $this->storeToS3($s3Client, $file_Path);

        }
    }

    public function getEnvData()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        self::$dotenv = $dotenv->load();
        $this->setRegion($_ENV['REGION']);
        $this->setKey($_ENV['S3_KEY']);
        $this->setSecret($_ENV['S3_SECRET_KEY']);
        $this->setBucketName($_ENV['BUCKET_NAME']);
        $this->setPath(Application::$ROOT_DIR . '/public/upload/');
    }

    public function generateFileName($file)
    {
        return md5(date('Y-m-d H:i:s:u')) . $file["name"];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    public function createS3Client($version, $region, $key, $secret)
    {
        return new S3Client([
            'version' => $version,
            'region' => $region,
            'credentials' => ['key' => $key, 'secret' => $secret]
        ]);
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     */
    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

    public function storeToS3($s3Client, $file_Path)
    {
        try {
            $s3Object = [
                'Bucket' => $this->getBucketName(),
                'Key' => $this->getKey(),
                'SourceFile' => $file_Path,
            ];
            $result = $s3Client->putObject($s3Object);
            return $this->setCarTransferImg($result);
        } catch (S3Exception $e) {
            return null;
        }
    }

    /**
     * @return string
     */
    public function getBucketName(): string
    {
        return $this->bucketName;
    }

    /**
     * @param string $bucketName
     */
    public function setBucketName(string $bucketName): void
    {
        $this->bucketName = $bucketName;
    }

    public function setCarTransferImg($result)
    {
        unlink($this->getPath() . $this->getFilename());
        return $result->get('ObjectURL');

    }


}