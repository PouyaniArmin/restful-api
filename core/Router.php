<?php


namespace Core;

class Router
{
    /**
     * $routes(it is work get all in check exists or not)
     */
    public array $routes;
    public Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            return "Not Found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->contrller = new $callback[0];
            $callback[0] = Application::$app->contrller;
        }

        return call_user_func($callback);
    }

    public function renderView($view): string
    {
        $cv = $this->renderOnlyView($view);
        $cl = $this->renderLayout();
        return str_replace("{{content}}", $cv, $cl);
    }

    public function renderLayout()
    {
        ob_start();
        require_once "./view/layout/main.php";
        return ob_get_clean();
    }


    public function renderOnlyView($view)
    {
        ob_start();
        require_once "./view/$view.php";
        return ob_get_clean();
    }
}
