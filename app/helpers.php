<?php

if(! function_exists('view')){
    function view($view, $data = ""){
        return new App\Libraries\Core\View($view, $data);
    }
}