<?php

namespace core;

use app\Kernel;

class BaseController
{
    private $middlewareClass;
  
    protected function middleware($middlewareKey)
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