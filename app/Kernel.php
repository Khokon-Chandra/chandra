<?php
namespace app;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;

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
