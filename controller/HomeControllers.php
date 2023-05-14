<?php 

namespace Controller;

use Core\Controllers;

class HomeControllers extends Controllers
{

    public function index(){
        return $this->view('home');
    }
}
