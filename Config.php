<?php
date_default_timezone_set("America/Sao_Paulo");

spl_autoload_register(function($class_name){
    $filename = "class".DIRECTORY_SEPARATOR.$class_name.".class.php";
    if(file_exists($filename)){
        require_once $filename;
    }else{
        die("A classe $class_name não foi encontrada");
    }
});