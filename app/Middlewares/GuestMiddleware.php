<?php
namespace app\Middlewares;

use khokonc\mvc\Route\Route;
use khokonc\mvc\BaseMiddleware as Middleware;

class GuestMiddleware extends Middleware
{
    public function handle(Route $app)
    {
        if($app->auth->id()){
            header("location:/");
        }
    }
}