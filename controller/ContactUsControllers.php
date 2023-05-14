<?php

namespace Controller;

use Core\Application;
use Core\Controllers;

class ContactUsControllers extends Controllers
{

    public function index()
    {
        return $this->view('contactUs');
    }
}
