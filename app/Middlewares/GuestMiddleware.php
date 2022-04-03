<?php
namespace app\Middlewares;

use core\Route;
use core\BaseMiddleware as Middleware;

class GuestMiddleware extends Middleware
{
    public function handle(Route $app)
    {
        if($app->auth->id()){
            header("location:/");
        }
    }
}