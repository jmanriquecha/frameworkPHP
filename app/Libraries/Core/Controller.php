<?php

namespace App\Libraries\Core;
use App\Libraries\Core\Request;

class Controller extends Request{

    function __construct(){
        parent::__construct();
        $this->load();
    }

    function load(){
        $controller = $this->getController();
        $file = __DIR__ ."/../../Models/{$controller}.php";
        $class = "App\\Models\\{$controller}";
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