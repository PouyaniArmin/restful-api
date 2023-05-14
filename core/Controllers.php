<?php 

namespace Core;

class Controllers{
    public function view($view){
        Application::$app->router->renderView($view);
    }
}