<?php

namespace Tolehoai\CarForRent\Model;

class Car
{
    private int $id;
    private string $img;
    private int $luggage;
    private int $doors;
    private int $passenger;
    private string $brand;
    private string $color;
    private string $name;

    /**
     * @param int $id
     * @param string $img
     * @param int $luggage
     * @param int $doors
     * @param int $passenger
     * @param float $price
     * @param string $brand
     * @param string $color
     * @param string $name
     */
    public function __construct(int $id, string $img, int $luggage, int $doors, int $passenger, float $price, string $brand, string $color, string $name)
    {
        $this->id = $id;
        $this->img = $img;
        $this->luggage = $luggage;
        $this->doors = $doors;
        $this->passenger = $passenger;
        $this->price = $price;
        $this->brand = $brand;
        $this->color = $color;
        $this->name = $name;
    }


    /**
     * @return int
     */
    public function getPassenger(): int
    {
        return $this->passenger;
    }

    /**
     * @param int $passenger
     */
    public function setPassenger(int $passenger): void
    {
        $this->passenger = $passenger;
    }
    /**
     * @return int
     */
    public function getLuggage(): int
    {
        return $this->luggage;
    }

    /**
     * @param int $luggage
     */
    public function setLuggage(int $luggage): void
    {
        $this->luggage = $luggage;
    }

    /**
     * @return int
     */
    public function getDoors(): int
    {
        return $this->doors;
    }

    /**
     * @param int $doors
     */
    public function setDoors(int $doors): void
    {
        $this->doors = $doors;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    private float $price;


    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}