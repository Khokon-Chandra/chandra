<?php


spl_autoload_register(function($className){
    $path = BASE_URL.'/'.$className.".php";
    if(file_exists($path)){
        include_once $path;
    }else{
        echo $className." not found";
        exit();
    }
});