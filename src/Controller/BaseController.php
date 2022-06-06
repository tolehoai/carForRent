<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;


class BaseController
{
    public Request $request;

    public function __construct(
        Request $request
    ) {
        $this->request = $request;
    }

    public function render($view, $param = [])
    {
        return View::renderView($view, $param);
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

}