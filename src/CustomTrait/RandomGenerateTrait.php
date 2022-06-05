<?php

namespace Tolehoai\CarForRent\CustomTrait;

trait RandomGenerateTrait
{
    public function generateUUID(){
        return uniqid();
    }
}