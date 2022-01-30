<?php
namespace core;

class Route
{
    public static View $view;
    private Request $request;
    public Session $session;
    public static Router $router;

    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request($this->session);
        self::$view    = new View($this->request, $this->session);
        self::$router  = new Router($this->request,$this->session,self::$view);
    }

    public static function get($path, $callback)
    {
        self::$router->get($path,$callback);
        return self::$router;
    }

    public static function post($path, $callback)
    {
        self::$router->post($path,$callback);
        return self::$router;
    }

    public function name($name)
    {
       self::$router->name($name);
    }

   
    public function run()
    {
        try{
            echo self::$router->resolve();    
        }catch(\Exception $error){
            http_response_code($error->getCode());
            echo $error->getMessage();
        }
    }



}
