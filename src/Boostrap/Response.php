<?php

namespace Tolehoai\CarForRent\Boostrap;

class Response
{
    public function setStatusCode(int $code){
        http_response_code($code);
    }
}
