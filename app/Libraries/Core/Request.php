<?php

namespace App\Libraries\Core;

class Request{

    private $url;
    private $controller;
    private $method;
    private $params = [];
   
    function __construct(){
        $this->setUrl();
        $this->setController();
        $this->setMethod();
        $this->setParams();
    }

    // Convertimos la url en Array
    private function setUrl(){
        $this->url = explode('/', $_SERVER['REQUEST_URI']);
    }

    private function setController(){
        $controller = $this->url[1] ? $this->url[1] : 'home';
        $this->controller = ucfirst($controller);
    }

    function getController(){
        return "{$this->controller}";
    }

    private function setMethod(){
        $this->method = $this->url[2] ? $this->url[2] : 'index';
    }

    function getMethod(){
        return $this->method;
    }

    private function setParams(){
        if($this->url[3])
        {
            for($i = 3; $i<count($this->url); $i++){
                $params .= $this->url[$i] . ",";
            }
            $this->params = trim($params, ",");
        }
    }

    function getParams(){
        return $this->params;
    }

    function send(){
        $response = new Response;
        $controller = $this->getController();
        $method = $this->getMethod();
        $params = $this->getParams();
        $response->response($controller, $method, $params);
    }

}