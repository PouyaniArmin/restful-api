<?php

// autoload 

use Controller\ContactUsControllers;
use Controller\HomeControllers;
use Core\Application;

require "./vendor/autoload.php";

$app=new Application();
$app->router->get('/',[HomeControllers::class,'index']);
$app->router->get('/contact',[ContactUsControllers::class,'index']);
$app->run();

