<?php
namespace App\Controllers;

use App\Kernel;
use khokonc\mvc\Auth;
use khokonc\mvc\Request;
use Khokonc\Mvc\Application;
use khokonc\mvc\Session;

class Controller{

    protected ?string $middleware = null;

    protected ?Auth $auth = null;

    protected ?Request $request = null;

    protected ?Session $session = null;

    public function set(Application $app)
    {
        $this->auth = $app->auth;
        $this->request = $app->request;
        $this->session = $app->session;
    }

    protected function middleware($middlewareKey)
    {
        $this->middleware = $middlewareKey;
    }

    public function getMiddleware(): ?string
    {
        return $this->middleware;
    }





}