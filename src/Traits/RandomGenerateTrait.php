<?php

namespace Tolehoai\CarForRent\Traits;

trait RandomGenerateTrait
{
    public function generateUUID(){
        return uniqid();
    }
}