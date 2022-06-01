<?php

namespace Tolehoai\CarForRent\Transfer;

class CarTransfer
{
    private ?int $id = null;
    private string $name;
    private string $brand;
    private string $color;
    private string $img;
    private int|string $luggage;
    private int|string $doors;
    private int|string $passenger;
    private int|string $price;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id??0;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id??0;
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
    public function getLuggage(): int|string
    {
        return $this->luggage;
    }

    /**
     * @param int $luggage
     */
    public function setLuggage(int|string $luggage): void
    {
        $this->luggage = $luggage;
    }

    /**
     * @return int
     */
    public function getDoors(): int|string
    {
        return $this->doors;
    }

    /**
     * @param int $doors
     */
    public function setDoors(int|string $doors): void
    {
        $this->doors = $doors;
    }

    /**
     * @return int
     */
    public function getPassenger(): int|string
    {
        return $this->passenger;
    }

    /**
     * @param int $passenger
     */
    public function setPassenger(int|string $passenger): void
    {
        $this->passenger = $passenger;
    }

    /**
     * @return int
     */
    public function getPrice(): int|string
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int|string $price): void
    {
        $this->price = $price;
    }

    public function fromArray(array $params)
    {

        $this->setName($params['name'] ?? null);
        $this->setBrand($params['brand'] ?? null);
        $this->setColor($params['color'] ?? null);
        $this->setLuggage($params['luggage'] ?? null);
        $this->setDoors($params['doors'] ?? null);
        $this->setPassenger($params['passenger'] ?? null);
        $this->setPrice($params['price'] ?? null);
        return $this;
    }

}