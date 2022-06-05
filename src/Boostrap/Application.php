<?php

namespace Tolehoai\CarForRent\Boostrap;

use Dotenv\Dotenv;

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
    

    public function __construct(string $rootPath)
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

    /**
     * @return string
     */
    public static function getROOTDIR(): string
    {
        return self::$ROOT_DIR;
    }

    /**
     * @param string $ROOT_DIR
     */
    public static function setROOTDIR(string $ROOT_DIR): void
    {
        self::$ROOT_DIR = $ROOT_DIR;
    }

    /**
     * @return Application
     */
    public static function getApplication(): Application
    {
        return self::$application;
    }

    /**
     * @param Application $application
     */
    public static function setApplication(Application $application): void
    {
        self::$application = $application;
    }

    /**
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @param Route $route
     */
    public function setRoute(Route $route): void
    {
        $this->route = $route;
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

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public static function getDotenv()
    {
        return self::$dotenv;
    }

    /**
     * @param mixed $dotenv
     */
    public static function setDotenv($dotenv): void
    {
        self::$dotenv = $dotenv;
    }


}
