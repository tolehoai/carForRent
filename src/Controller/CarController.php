<?php

namespace Tolehoai\CarForRent\Controller;

use Aws\S3\S3Client;
use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Service\UploadService;

class CarController
{
    private Request $request;
    private UploadService $uploadService;

    public function __construct(Request $request, UploadService $uploadService)
    {
        $this->request = $request;
        $this->uploadService = $uploadService;
    }

    public function addCar()
    {
        if ($this->request->isGet()) {
            return View::renderView(
                'addcar',
                []);
        }


    }

    public function addCarPost()
    {
        $imageUrl = $this->uploadService->uploadImage($_FILES['image']);
        echo $imageUrl;
    }
}