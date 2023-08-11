<?php

namespace App\Libraries\Core;
use App\Libraries\Core\Response;

class Controller{

    function __Construct(){

    }

    function load($controller, $method){
        $file = __DIR__ ."/../../Models/{$controller}.php";
        $class = "App\\Models\\{$controller}";
        $method = $method;
        if(file_exists($file)){
            if(class_exists($class)){
                include_once $file;
                $this->model = new $class;
            }
            else{
                echo "La clase {$class} del modelo no existe";
            }
        }
        else{
            echo "Archivo modelo no existe";
        }
    }
}