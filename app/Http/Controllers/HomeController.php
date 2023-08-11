<?php

namespace App\Http\Controllers;

use App\Libraries\Core\Controller;

class HomeController extends Controller{
    
    function index($params){
        $data['id'] = 'Saludo';
        $data['param'] = $params[0];
        return view("welcome", $data);
    }
}