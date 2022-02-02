<?php
namespace app\Middlewares;

use core\Request;
use app\Middlewares\BaseMiddleware as Middleware;
use core\Route;

class GuestMiddleware extends Middleware
{
    public function handle(Route $app)
    {
        if($app->auth->id()){
            header("location:/");
        }
    }
}