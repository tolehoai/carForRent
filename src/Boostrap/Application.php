<?php

namespace Tolehoai\CarForRent\Boostrap;

class Application
{
    /**
     * @var string
     */
    public static string $ROOT_DIR;
    /**
     * @var Route
     */
    public Route $route;
    /**
     * @var Request
     */
    public Request $request;

    /**
     * @param $rootPath
     */
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->route = new Route($this->request);
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->route->resolve();
    }
}
