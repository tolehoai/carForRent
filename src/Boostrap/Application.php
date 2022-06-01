<?php

namespace Tolehoai\CarForRent\Boostrap;

class Application
{
    /**
     * @var string
     */
    public static string $ROOT_DIR;
    public static Application $application;
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
    public Response $response;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->route = new Route($this->request, $this->response);
    }

    /**
     * @return void
     */
    public function run()
    {
        echo Route::resolve();
    }
}
