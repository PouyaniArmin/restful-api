<?php

namespace Core;

class Application
{


    public Request $request;
    public Router $router;
    public Controllers $contrller;

    public static Application $app;

    // initialize Router & Request & static application(access all class in project) 
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request;
        $this->router = new Router($this->request);
    }


    // initialize controller(extends conterller folder)
    public function getController(): Controllers
    {
        return $this->contrller;
    }

    public function setController(Controllers $contrller)
    {
        $this->contrller = $contrller;
    }

    //show view 
    public function run()
    {
        echo $this->router->resolve();
    }
}
