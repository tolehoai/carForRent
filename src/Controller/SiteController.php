<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;

class SiteController extends Controller
{

    public function home()
    {
        return View::renderView(
            'home',
            [
                'name' => 'To Le Hoai'

            ]
        );
    }
}