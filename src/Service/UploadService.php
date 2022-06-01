<?php

namespace Tolehoai\CarForRent\Service;

use Aws\S3\S3Client;
use Tolehoai\CarForRent\Boostrap\Application;

class UploadService
{
    public function uploadImage($file){
        $path =Application::$ROOT_DIR.'/public/upload/';
        $filename = md5(date('Y-m-d H:i:s:u')) . $file["name"];
        if (move_uploaded_file($file["tmp_name"], $path . $filename)) {

            // Instantiate the client.
            $s3Client = new S3Client([
                'version' => 'latest',
                'region' => 'ap-southeast-1',
                'credentials' => ['key' => 'AKIAYJ57HRH2HGDYQD7Z', 'secret' => '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']
            ]);
            $bucketName = 'hoaicarforrent';

            $file_Path = $path . $filename;
            $key = basename($file_Path);
            try {
                $result = $s3Client->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $key,
                    'SourceFile' => $file_Path,
                ]);
                unlink($path . $filename);
                return $result->get('ObjectURL');
            } catch (S3Exception $e) {
                return null;
            }
        }
    }
}