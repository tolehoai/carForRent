<?php

namespace Tolehoai\CarForRent\Boostrap;

class Controller
{
    public function render($view,$param = []){
         return Application::$application->route->renderView($view, $param);
    }
}