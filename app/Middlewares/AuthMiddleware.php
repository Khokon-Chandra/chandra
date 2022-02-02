<?php
namespace app\Middlewares;

use core\Request;
use app\Middlewares\BaseMiddleware as Middleware;
use core\Route;

class AuthMiddleware extends Middleware
{
    public function handle(Route $app)
    {
        if($app->auth->id() === false){
            header("location:/login");
        }
    }
}