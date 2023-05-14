<?php 

namespace Core;


class Controllers{

    public $layout='main';
    public function view($view){
       return Application::$app->router->renderView($view);
    }
    public function setLayout(string $layout){
        $this->layout=$layout;
    }
}