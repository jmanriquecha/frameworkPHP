<?php

namespace App\Libraries\Core;

class Response{
    function response($controller, $method, $params){
        $this->className = "{$controller}Controller";
        $this->methodName = $method;
        $this->controller = "App\\Http\\Controllers\\{$this->className}";
        $file = __DIR__ ."/../../Http/Controllers/{$this->className}.php";
        
        if(file_exists($file)){
            if(class_exists($this->controller)){
                $classController = new $this->controller;
                if(method_exists($classController, $method)){
                    $params = $params ? explode(",", $params) : '';
                    $classController->{$method}($params);
                    
                    //Enviamos datos al controlador
                    $class = new Controller;
                    $class->load($controller, $method);
                }
                else{
                    echo "El metodo {$method} NO existe en el controlador {$this->controller}";
                }
            }
            else{
                echo "La clase {$this->controller} NO existe en el controlador";
            }
        }
        else{
            echo "El archivo {$file} no exite";
        }
    }
}