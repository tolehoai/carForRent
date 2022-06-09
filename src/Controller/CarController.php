<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\CarRepository;
use Tolehoai\CarForRent\Service\UploadService;
use Tolehoai\CarForRent\Transfer\CarTransfer;
use Tolehoai\CarForRent\Validator\CarValidator;

class CarController
{
    private Request $request;
    private UploadService $uploadService;
    private CarTransfer $carTransfer;
    private CarRepository $carRepository;
    private CarValidator $carValidator;

    public function __construct(
        Request       $request,
        UploadService $uploadService,
        CarTransfer   $carTransfer,
        CarRepository $carRepository,
        CarValidator  $carValidator
    )
    {
        $this->request = $request;
        $this->uploadService = $uploadService;
        $this->carTransfer = $carTransfer;
        $this->carRepository = $carRepository;
        $this->carValidator = $carValidator;
    }

    public function addCar()
    {
        if ($this->request->isGet()) {
            return View::renderView(
                'addcar',
                []
            );
        }
        $this->carTransfer->fromArray($this->request->getBody());
        $isUploadCarValid = $this->carValidator->validateCarUpload($this->carTransfer, $_FILES['image']);
        if (!empty($isUploadCarValid)) {
            return View::renderView(
                'addcar',
                ["formError" => $isUploadCarValid]
            );
        }

        $imgUrl = $this->uploadService->uploadImage($_FILES['image']);
        $this->carTransfer->setImg($imgUrl);
        $isAddCarSuccess = $this->carRepository->save($this->carTransfer);
        $message = [];
        if (!$isAddCarSuccess) {
            $message = [
                'failed' => true,
                'message' => 'Add car to database failed'
            ];
            return View::renderView('addcar', $message);
        }
        $message = [
            'success' => true,
            'message' => 'Add car Sucessfully!'
        ];
        return View::renderView('addcar', $message);
    }

}