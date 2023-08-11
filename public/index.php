<?php
require __DIR__ . "./../vendor/autoload.php";
use App\Libraries\Core\Request;

$request = new Request;
try {
    echo $request->send();
} catch (Error $e) {
    echo $e->getMessage();
    echo "<br>";
    echo $e->getLine();
    echo "<br>";
    echo $e->getFile();
}
// echo $request->getController() . "<br>";
// echo $request->getMethod();