<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use khokonc\mvc\Auth;
use khokonc\mvc\Request;

class ForgotPasswordController extends Controller
{

    public function __construct()
    {
        $this->model = new User();
    }

    public function create()
    {   
      
        return view('auth.forgot', [
            'pageTitle' =>'Login',
            'name' => 'Khokon Chandra',
        ]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|exists:users',
        ]);


       $user = $this->model->where('email',$request->email)->first();

        return redirect('/');
       
    }


    public function destroy(Request $request)
    {
        $this->auth->logout();
    }


}