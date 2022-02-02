<?php

namespace core;

use app\Exceptions\CsrfTokenNotVerified;
use app\Exceptions\NotFoundException;

class Router
{
    private Request $request;
    private Session $session;
    private View $view;

    public $routes = [];
    public $tempRoute   = '';
    public $routeNames = [];
    

    public function __construct($request, $session, $view)
    {
        $this->request = $request;
        $this->session = $session;
        $this->view    = $view;
    }

    private function makeRoutePattern($path)
    {
        $pattern = "~{(\w+)}~";
        $replacement = "(.*)";
        $path    = preg_replace($pattern, $replacement, $path);
        return "~^" . $path . "?$~";
    }


    private function trimPath($path)
    {
        return '/' . trim($path, '/');
    }

    private function setTempRoute($path)
    {
        $this->tempRoute = APP_URL . $path;
    }


    public function get($path, $callback)
    {

        $path = $this->trimPath($path);
        $this->setTempRoute($path);
        $this->routes['get'][$this->makeRoutePattern($path)] = $callback;
    }

    public function post($path, $callback)
    {
        $path = $this->trimPath($path);
        $this->setTempRoute($path);
        $this->routes['post'][$this->makeRoutePattern($path)] = $callback;
    }

    public function name($name)
    {
        $this->routeNames[$name] = $this->tempRoute;
    }


    public function resolve()
    {
        if ($this->request->verifyCsrfTocken() === false && $this->request->isPost()) {
            throw new CsrfTokenNotVerified();
        }
        $requestPath = $this->request->getPath();
        $routes      = $this->routes[$this->request->getMethod()];
        foreach($routes as $pattern => $callback){
            $isMatch = preg_match($pattern, $requestPath);
            if(!$isMatch) continue;
            preg_match($pattern,$requestPath,$matches);
            if (is_array($callback)) {
                $callback[0] = new $callback[0]();
                $middleware  = $callback[0]->getMiddleware();
                if(is_object($middleware)){
                    $middleware->handle(Route::$app);
                }
            }
            $matches = array_slice($matches,1);
            array_unshift($matches,$this->request);
            return call_user_func($callback, ...$matches);
        }
        throw new NotFoundException();

  
    }
}
  