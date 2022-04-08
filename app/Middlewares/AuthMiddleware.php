<?php
namespace App\Middlewares;


use khokonc\mvc\BaseMiddleware as Middleware;
use Khokonc\Mvc\Routes\Route;

class AuthMiddleware extends Middleware
{
    public function handle(Route $app)
    {
        if($app->auth->id() === false){
            header("location:/login");
        }
    }
}