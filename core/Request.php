<?php 

namespace Core;

class Request{
    
    public function path(){
        return $_SERVER['REQUEST_URI'];
    }

    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}