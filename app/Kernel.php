<?php
namespace app;

use app\Middlewares\AuthMiddleware;
use app\Middlewares\GuestMiddleware;

class Kernel
{
    public function middleware($key)
    {
        return $this->registerMiddleware()[$key];
    }

    public function registerMiddleware()
    {
        return [
            'auth' => AuthMiddleware::class,
            'guest' => GuestMiddleware::class,
        ];
    }
}
