<?php

namespace Test\Tolehoai\CarForRent\Transformer;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Car;
use Tolehoai\CarForRent\Transformer\CarTransformer;

class CarTransformerTest extends TestCase
{
    public function testTransform()
    {
        $carTransformer = new CarTransformer();
        $car = new Car();
        $car->setId(1);
        $car->setName('vios');
        $car->setBrand('toyota');
        $car->setColor('white');
        $car->setImg('car.jpg');
        $car->setLuggage(2);
        $car->setDoors(2);
        $car->setPrice(2);
        $car->setPassenger(2);

        $result = $carTransformer->transform($car);
        $expected = [
            'id'=>1,
            'name' => 'vios',
            'brand' => 'toyota',
            'color' => 'white',
            'img'=>'car.jpg',
            'luggage' => 2,
            'doors' => 2,
            'passenger' => 2,
            'price' => 2
        ];

        $this->assertEquals($expected, $result);
    }
}