<?php

namespace app\Controllers\Auth;

use app\Controllers\Controller;
use app\Models\User;
use core\Auth;
use core\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->model = new User();
    }

    public function create()
    {   
      
        return view('auth.login', [
            'pageTitle' =>'Login',
            'name' => 'Khokon Chandra',
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);
     
       $user = $this->model->where('email',$request->email)->first();
       if(password_verify($request->password,$user->password)){
           $this->auth->attemt($user);
           header('location:/');
       }       
        header('location:/login');
    }


    public function destroy(Request $request)
    {
        $this->auth->logout();
    }


}