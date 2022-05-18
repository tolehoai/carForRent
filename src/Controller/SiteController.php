<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Application;
use Tolehoai\CarForRent\Boostrap\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $param = [
            'name' => 'To Le Hoai'
        ];
        return $this->render('home', $param);
    }

    public function contact()
    {
        $param = [
            'name' => 'To Le Hoai'
        ];
        return $this->render('contact', $param);
    }

    public function handleContact()
    {
        return "Handle submit data";
    }
}