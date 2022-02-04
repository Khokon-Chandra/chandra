<?php
namespace app\Middlewares;

use core\Request;
use core\BaseMiddleware as Middleware;
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