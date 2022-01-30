<?php
namespace core;

class Router
{
    private Request $request;
    private Session $session;
    private View $view;

    public $routes = [];
    public $path   = '';
    public $routeNames = [];
    

    public function __construct($request, $session, $view)
    {
        $this->request = $request;
        $this->session = $session;
        $this->view    = $view;
    }


    public function get($path, $callback)
    {
        $path = '/'.trim($path,'/');
        $this->path =APP_URL.$path;
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $path = '/'.trim($path,'/');
        $this->path = APP_URL.$path;
        $this->routes['post'][$path] = $callback;
    }

    public function name($name)
    {
        $this->routeNames[$name] = $this->path;
       
    }


    public function resolve()
    {
       
        if($this->request->verifyCsrfTocken() === false && $this->request->isPost())
        {
            $this->view->renderError('Csrf_Token is not verified');
            return $this->view->viewContent;
        }
        
        $callback = $this->routes[$this->request->getMethod()][$this->request->getPath()]??false;
               
        if($callback === false){
            return "404 page not found";
        }

        if(is_string($callback)){
            return $callback;
        }
        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback,$this->request);

    }

}