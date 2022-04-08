<?php
namespace app\Controllers;

use app\Kernel;
use khokonc\mvc\Auth;
use khokonc\mvc\Request;
use khokonc\mvc\Route\Route;
use khokonc\mvc\Session;

class Controller{

    private $middlewareClass;
    protected ?Auth $auth;
    protected ?Request $request;
    protected ?Session $session;
    
    
    public function setRequest(?Request $request)
    {
        $this->request = $request;
        $this->session = $request->session;
    }

    public function setAuth(?Auth $auth)
    {
        $this->auth = $auth;
    }

    public function middleware($middlewareKey)
    {
        $kernel = new Kernel();
        $this->middlewareClass = $kernel->middleware($middlewareKey);
    }


    public function getMiddleware()
    {
        if(isset($this->middlewareClass)){
            return new $this->middlewareClass();
        }
        return false;
    }

}