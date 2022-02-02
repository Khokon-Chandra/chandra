<?php

namespace core;

class Route
{
    public View $view;
    public Request $request;
    public Session $session;
    public Router $router;
    public Auth $auth;
    public static $app;
    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request($this->session);
        $this->view    = new View($this->request, $this->session);
        $this->router  = new Router($this->request, $this->session, $this->view);
        $this->auth    = new Auth();
        self::$app     = $this;
    }

    public static function get($path, $callback)
    {
        self::$app->router->get($path, $callback);
        return self::$app->router;
    }

    public static function post($path, $callback)
    {
        self::$app->router->post($path, $callback);
        return self::$app->router;
    }

    public function name($name)
    {
        self::$app->router->name($name);
    }


    public function run()
    {
        try {
            echo self::$app->router->resolve();
        } catch (\Exception $error) {
            http_response_code($error->getCode());
            echo $error->getMessage();
        }
    }
}
