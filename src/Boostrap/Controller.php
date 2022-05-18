<?php

namespace Tolehoai\CarForRent\Boostrap;

class Controller
{
    public function render($view, $param = [])
    {
        return View::renderView($view, $param);
    }
}
