<?php
namespace core;

class Auth
{
    private $session;
    
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function attemt($attr)
    {
        $this->session->set('auth',$attr);        
    }

    public function id()
    {
       return $this->session->get('auth')->id??false;
    }
    
    public function user()
    {
        return $this->session->get('auth');
    }

    public function logout()
    {
        $this->session->remove('auth');
    }

    
}