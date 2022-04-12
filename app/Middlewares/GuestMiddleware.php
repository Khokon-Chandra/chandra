<?php
namespace App\Middlewares;

use Khokonc\Mvc\Application;
use khokonc\mvc\BaseMiddleware as Middleware;

class GuestMiddleware extends Middleware
{
    public function handle(Application $app)
    {
        if($app->auth->id()){
            header("location:/");
        }
    }
}