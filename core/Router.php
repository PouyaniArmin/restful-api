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
        if ($callback == false) {
            return "fasle";
        }
        if (is_string($callback)) {
          $this->renderView($callback);
        }
        if (is_array($callback)) {
            // $callback[0] = new $callback[0];
            Application::$app->contrller=new $callback[0];
            $callback[0]=Application::$app->contrller;
        }

        return call_user_func($callback);
    }

    public function renderView($callback){
        return require "./view/$callback.php";
    }
}
