<?php
namespace core;

abstract class BaseMiddleware{

    abstract function handle(Route $app);
    
}