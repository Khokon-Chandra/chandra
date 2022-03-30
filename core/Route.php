<?php

namespace core;

use app\Controllers\Controller;
use app\Exceptions\NotFoundException;
use core\Exceptions\DbException;

class Route
{
    public View $view;
    public Request $request;
    public Session $session;
    public Router $router;
    public Auth $auth;
    public Controller $controller;
    public Database $db;
    public static $app;
    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request($this->session);
        $this->view    = new View($this->request, $this->session);
        $this->auth    = new Auth($this->session);
        $this->router  = new Router($this->request, $this->session, $this->auth);
        $this->db      = new Database();
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

    public static function group(array $attribute = [], $callback)
    {
        self::$app->router->group($attribute,$callback);
    }

    public function name($name)
    {
        self::$app->router->name($name);
    }


    public function run()
    {
        try {
            echo self::$app->router->resolve();
        }
        catch(NotFoundException $error){
            $view = BASE_URL."/views/errors/404.php";
            if(file_exists($view)){
                echo view('errors.404',[
                    'pageTitle' => 'Page not found',
                    'code' => $error->getCode(),
                    'message' => $error->getMessage()
                ]);
            }
        }
        catch (\Exception $error) {
            http_response_code($error->getCode());
            print($error->getMessage());
           if($error->getCode() === 302){
               header("location:".$error->getMessage());
           }
        }
    }
}
