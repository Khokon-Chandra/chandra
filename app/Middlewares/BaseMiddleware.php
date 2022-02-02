<?php
namespace app\Middlewares;

use core\Request;
use core\Route;

abstract class BaseMiddleware{

    abstract function handle(Route $app);
    
}