<?php

namespace app\Controllers\Auth;

use core\Request;
use app\Controllers\Controller;
use app\Models\User;

class RegisterController extends Controller
{
    private $model;



    public function __construct()
    {
        $this->model = new User();
    }



    public function create()
    {    
        
        return view('auth.register', [
            'pageTitle'=>'register',
            'name' => 'Khokon Chandra',
        ]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'=>'required|min:5',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $attributes['password'] = password_hash($attributes['password'], PASSWORD_DEFAULT);
        $this->model->create($attributes);
        $request->session->setFlashMessage('success','Successfully Registered');
        header('location:/login');
    }


}