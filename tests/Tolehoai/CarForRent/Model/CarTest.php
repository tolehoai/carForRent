<?php

namespace Test\Tolehoai\CarForRent\Model;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Car;

class CarTest extends TestCase
{
    public function testGetId()
    {
        $car = new Car();
        $expected = 1;
        $car->setId($expected);
        $car_id = $car->getId();
        $this->assertEquals($expected, $car_id);
    }

    public function testGetImg()
    {
        $car = new Car();
        $expected = 'img1.jpg';
        $car->setImg($expected);
        $image = $car->getImg();
        $this->assertEquals($expected, $image);
    }

    public function testGetLuggage()
    {
        $car = new Car();
        $expected = 1;
        $car->setLuggage($expected);
        $result = $car->getLuggage();
        $this->assertEquals($expected, $result);
    }

    public function testGetDoors()
    {
        $car = new Car();
        $expected = 1;
        $car->setDoors($expected);
        $result = $car->getDoors();
        $this->assertEquals($expected, $result);
    }

    public function testGetPassenger()
    {
        $car = new Car();
        $expected = 1;
        $car->setPassenger($expected);
        $result = $car->getPassenger();
        $this->assertEquals($expected, $result);
    }

    public function testGetPrice()
    {
        $car = new Car();
        $expected = 1;
        $car->setPrice($expected);
        $result = $car->getPrice();
        $this->assertEquals($expected, $result);
    }

    public function testGetBrand()
    {
        $car = new Car();
        $expected = 1;
        $car->setBrand($expected);
        $result = $car->getBrand();
        $this->assertEquals($expected, $result);
    }

    public function testGetColor()
    {
        $car = new Car();
        $expected = 'white';
        $car->setColor($expected);
        $result = $car->getColor();
        $this->assertEquals($expected, $result);
    }

    public function testGetName()
    {
        $car = new Car();
        $expected = 'Toyota';
        $car->setName($expected);
        $result = $car->getName();
        $this->assertEquals($expected, $result);
    }

}