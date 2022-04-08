<?php

namespace app\Controllers\Auth;

use app\Controllers\Controller;
use app\Models\User;
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
       if(password_verify($request->password,$user->password)){
           $this->auth->attemt([
               'id'=>$user->id,
               'name'=>$user->name,
               'email'=>$user->email,
               'created_at'=>$user->created_at,
           ]);
       }       
    $user = $this->model->where('email',$request->email)->first();
    
    redirect('/');
       
    }


    public function destroy(Request $request)
    {
        $this->auth->logout();
    }


}