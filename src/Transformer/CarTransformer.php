<?php

namespace Tolehoai\CarForRent\Transformer;

use Tolehoai\CarForRent\Model\Car;

class CarTransformer
{
    /**
     * @param Car $car
     * @return void
     */

    public function transform($car): array
    {
        return [
            'id' => $car->getId(),
            'name'=>$car->getName(),
            'brand'=>$car->getBrand(),
            'color'=>$car->getColor(),
            'img'=>$car->getImg()
        ];
    }

}