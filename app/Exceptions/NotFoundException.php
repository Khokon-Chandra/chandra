<?php
namespace app\Exceptions;

class NotFoundException extends \Exception
{
    protected $message = "Page Not Found";
    protected $code = 404;

    public function __construct(string $message=null)
    {
        if(!is_null($message)){
            $this->message = $message;
        }
        
    }

}