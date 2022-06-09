<?php

namespace Tolehoai\CarForRent\Transfer;

class CarTransfer
{
    private ?int $id = null;
    private string $name;
    private string $brand;
    private string $color;
    private string $img;
    private ?int $luggage = null;
    private ?int $doors = null;
    private ?int $passenger = null;
    private ?int $price = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id ?? 0;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id ?? 0;
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
    public function getLuggage(): ?int
    {
        return $this->luggage;
    }

    /**
     * @param int $luggage
     */
    public function setLuggage(?int $luggage): void
    {
        $this->luggage = $luggage;
    }

    /**
     * @return int
     */
    public function getDoors(): ?int
    {
        return $this->doors;
    }

    /**
     * @param int $doors
     */
    public function setDoors(?int $doors): void
    {
        $this->doors = $doors;
    }

    /**
     * @return int
     */
    public function getPassenger(): ?int
    {
        return $this->passenger;
    }

    /**
     * @param int $passenger
     */
    public function setPassenger(?int $passenger): void
    {
        $this->passenger = $passenger;
    }

    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function fromArray(array $params)
    {
        $this->setName($params['name'] ?? null);
        $this->setBrand($params['brand'] ?? null);
        $this->setColor($params['color'] ?? null);
        $this->setLuggage(is_numeric($params['luggage']) ? (int)$params['luggage'] : null);
        $this->setDoors(is_numeric($params['doors']) ? (int)$params['doors'] : null);
        $this->setPassenger(is_numeric($params['passenger']) ? (int)$params['passenger'] : null);
        $this->setPrice(is_numeric($params['price']) ? (int)$params['price'] : null);
        return $this;
    }

}