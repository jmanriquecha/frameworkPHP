<?php

if(! function_exists('view')){
    function view($view, $data = ""){
        return new App\Libraries\Core\View($view, $data);
    }
}

if(! function_exists('load')){
    function load($controller){
        return new App\Libraries\Core\Controller($controller);
    }
}