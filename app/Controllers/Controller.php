<?php
namespace app\Controllers;

use app\Kernel;
use core\Auth;
use core\Request;
use core\Route;

class Controller{

    private $middlewareClass;
    protected ?Auth $auth;
    protected ?Request $request;
    
    
    public function setRequest(?Request $request)
    {
        $this->request = $request;
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