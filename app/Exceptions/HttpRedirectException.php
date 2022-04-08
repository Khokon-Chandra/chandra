<?php
namespace App\Exceptions;

class HttpRedirectException extends \Exception
{
    protected $code = 302;

    public function __construct(string $message=null)
    {
        $this->message = $message;  
    }

}