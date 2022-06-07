<?php

namespace Test\Tolehoai\CarForRent\Transfer;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Transfer\CarTransfer;

class CarTransferTest extends TestCase
{
    public function testGetId()
    {
        $carTransfer = new CarTransfer();
        $result = 1;
        $carTransfer->setId($result);
        $expected = $carTransfer->getId();
        $this->assertEquals($result, $expected);
    }

    public function testGetName()
    {
        $carTransfer = new CarTransfer();
        $result = 'toyota';
        $carTransfer->setName($result);
        $expected = $carTransfer->getName();
        $this->assertEquals($result, $expected);
    }

    public function testGetBrand()
    {
        $carTransfer = new CarTransfer();
        $result = 'toyota';
        $carTransfer->setBrand($result);
        $expected = $carTransfer->getBrand();
        $this->assertEquals($result, $expected);
    }

    public function testGetColor()
    {
        $carTransfer = new CarTransfer();
        $result = 'white';
        $carTransfer->setColor($result);
        $expected = $carTransfer->getColor();
        $this->assertEquals($result, $expected);
    }

    public function testGetImg()
    {
        $carTransfer = new CarTransfer();
        $result = 'img1.jpg';
        $carTransfer->setImg($result);
        $expected = $carTransfer->getImg();
        $this->assertEquals($result, $expected);
    }

    public function testGetLuggage()
    {
        $carTransfer = new CarTransfer();
        $result = 2;
        $carTransfer->setLuggage($result);
        $expected = $carTransfer->getLuggage();
        $this->assertEquals($result, $expected);
    }

    public function testGetDoors()
    {
        $carTransfer = new CarTransfer();
        $result = 2;
        $carTransfer->setDoors($result);
        $expected = $carTransfer->getDoors();
        $this->assertEquals($result, $expected);
    }

    public function testGetPassenger()
    {
        $carTransfer = new CarTransfer();
        $result = 2;
        $carTransfer->setPassenger($result);
        $expected = $carTransfer->getPassenger();
        $this->assertEquals($result, $expected);
    }

    public function testGetPrice()
    {
        $carTransfer = new CarTransfer();
        $result = 2;
        $carTransfer->setPrice($result);
        $expected = $carTransfer->getPrice();
        $this->assertEquals($result, $expected);
    }

    public function testFromArray()
    {
        $params = [

            'name' => 'vios',
            'brand' => 'toyota',
            'color' => 'white',

            'luggage' => 1,
            'doors' => 4,
            'passenger' => 4,
            'price' => 300
        ];

        $expected = new CarTransfer();
        $expected->fromArray($params);
        $this->assertEquals($params['name'], $expected->getName());
        $this->assertEquals($params['brand'], $expected->getBrand());
        $this->assertEquals($params['color'], $expected->getColor());
        $this->assertEquals($params['luggage'], $expected->getLuggage());
        $this->assertEquals($params['doors'], $expected->getDoors());
        $this->assertEquals($params['passenger'], $expected->getPassenger());
        $this->assertEquals($params['price'], $expected->getPrice());
    }
}