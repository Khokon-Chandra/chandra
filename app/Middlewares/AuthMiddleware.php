<?php
namespace App\Middlewares;


use khokonc\mvc\BaseMiddleware as Middleware;
use khokonc\mvc\Application;


class AuthMiddleware extends Middleware
{
    public function handle(Application $app)
    {
        if($app->auth->id() === false){
            header("location:/login");
        }
    }
}