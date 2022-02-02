<?php

use core\Route;
use core\Session;
use core\View;


$route = new Route();



function view(string $view, array $params = [])
{
    return Route::$app->view->renderView($view, $params);
}

function getApp()
{
    global $route;
    return $route;
}

function _token()
{
    $app = getApp();
    if(empty($app->session->getToken())){
        $app->session->setToken();
    }
    return $app->session->getToken();
}

function csrf_token()
{
    return sprintf("<input type='hidden' name='_token' value='%s'>",_token());
}


function asset(string $file)
{
    echo APP_URL.'/'.trim($file,'/');
}


function route($name, $parm = null)
{
    $routeName =  Route::$app->router->routeNames[$name]??false;
    if($routeName === false)
    {
      Route::$app->view->renderError("Route name <i class='text-danger'>$name</i> not found");
        return Route::$view->viewContent;
    }
    return $routeName;
}



function dd($object)
{
    echo "<pre>";
    var_dump($object);
    echo "<pre>";
    exit();
}




