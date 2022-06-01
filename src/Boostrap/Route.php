<?php

namespace Tolehoai\CarForRent\Boostrap;

class Route
{
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var array
     */
    protected array $route = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $path
     * @param $callback
     * @return void
     */
    public function get($path, $callback)
    {
        $this->route['get'][$path] = $callback;
    }

    /**
     * @return void
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->route[$method][$path] ?? false;
        if ($callback === false) {
            $callback = $this->route['get']['/404'];
        }
//        if (is_string($callback)) {
//            return $this->renderView($callback);
//        }
        return $this->renderView($callback);
//        return call_user_func($callback);
    }

    /**
     * @param string $view
     * @return void
     */
    private function renderView(string $view)
    {
        $layoutContent = $this->layoutContent();
        include_once Application::$ROOT_DIR . "/src/View/$view.php";
    }

    /**
     * @return false|string
     */
    private function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/src/View/layouts/home.php";
        return ob_get_clean();
    }


}
