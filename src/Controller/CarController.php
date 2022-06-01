<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;

class CarController
{
    private Request $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function addCar()
    {
        return View::renderView(
            'addcar',
            [

            ]
        );

    }

    public function addCarPost()
    {
        $hinhsanpham = $_FILES["image"]["name"];
        $dst = "/var/www/tolehoai/carForRent/uploads/" . $hinhsanpham;
        //    echo '<script type="text/javascript">alert("' . $dst . '")</script>';
        move_uploaded_file($_FILES["image"]["tmp_name"], $dst);

    }

}