<?php
namespace App\Middlewares;


use khokonc\mvc\BaseMiddleware as Middleware;
use khokonc\mvc\Routes\Route;


class AuthMiddleware extends Middleware
{
    public function handle(Route $app)
    {
        if($app->auth->id() === false){
            header("location:/login");
        }
    }
}