<?php

namespace Tolehoai\CarForRent\Boostrap;

class Route
{
    /**
     * @var Request
     */
    public static Request $request;
    /**
     * @param Request $request
     */
    public static Response $response;
    /**
     * @var array
     */
    protected static array $route = [];

    public function __construct(Request $request, Response $response)
    {
        self::$request = $request;
        self::$response = $response;
    }

    public static function get($path, $callback)
    {
        self::$route['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        static::$route['post'][$path] = $callback;
    }

    public static function resolve()
    {
        $path = self::$request->getPath();
        $method = self::$request->getMethod();
        $callback = self::$route[$method][$path] ?? false;
        if ($callback === false) {
            self::$response->setStatusCode(404);
            return View::renderView('404');
        }
        if (is_string($callback)) {
            return View::renderView($callback);
        }
        return call_user_func($callback);
    }
}
