<?php

namespace Tolehoai\CarForRent\Boostrap;

class View
{
    /**
     * @param  string $view
     * @return array|false|string|string[]
     */
    public static function renderView(string $view,array $params = [])
    {
        $layoutContent = self::layoutContent();
        $viewContent = self::renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public static function layoutContent()
    {
        ob_start();
        include_once __DIR__ . "/../View/layouts/mainLayout.php";
        return ob_get_clean();
    }

    /**
     * @param $view
     * @param $params
     * @return bool|string
     */
    public static function renderOnlyView(string $view, array $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/../View/$view.php";
        return ob_get_clean();
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
    }
}
