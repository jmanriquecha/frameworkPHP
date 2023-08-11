<?php

namespace App\Libraries\Core;

class View{

    private $view;

    function __construct($view, $data){
       $this->view = $view;
       $this->view($data);
    }

    function view($data){
        $view = explode(".", $this->view);
        $directory = '';
        for ($i=0; $i < count($view) ; $i++) { 
            $directory .= $view[$i] . "/";
        }
        $directory = trim($directory, "/");       
        $view = __DIR__ . "/../../../views/{$directory}.php";

        if(file_exists($view)){
            include_once $view;
        }
        else{
            echo "La vista {$view} no existe 404";
        }
    }
}