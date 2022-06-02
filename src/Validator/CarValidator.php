<?php

namespace Tolehoai\CarForRent\Validator;

use Tolehoai\CarForRent\Transfer\CarTransfer;

class CarValidator
{
    public function validateCarUpload(CarTransfer $car, $file)
    {
        $validator = new Validator();
        $validator->name('name')->value($car->getName())->min(3)->max(255)->required();
        $validator->name('brand')->value($car->getBrand())->min(3)->max(255)->required();
        $validator->name('color')->value($car->getColor())->max(30)->required();
        $validator->name('luggage')->value($car->getLuggage())->is_int()->max(30)->required();
        $validator->name('doors')->value($car->getDoors())->is_int()->max(30)->required();
        $validator->name('passenger')->value($car->getPassenger())->is_int()->max(30)->required();
        $validator->name('price')->value($car->getPrice())->is_int()->max(30)->required();
        $validator->name('image')->file($file)->checkSize(2);
        if($validator->isSuccess()){
            return true;
        }else{
            return $validator->getErrors();
        }
    }
}