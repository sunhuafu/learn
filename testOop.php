<?php


spl_autoload_register("my_autoload");


function my_autoload($class)
{
//    var_dump($class);
    require __DIR__ . DIRECTORY_SEPARATOR . "oop" . DIRECTORY_SEPARATOR . $class . ".php";
}


$find = new Find();

$find->draw();
