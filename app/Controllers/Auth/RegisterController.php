<?php

namespace app\Controllers\Auth;

use core\Request;
use app\Controllers\Controller;

class RegisterController extends Controller
{


    public function create()
    {    
        return view('auth.register', [
            'name' => 'Khokon Chandra',
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'=>'required|min:5',
            'email' => 'required',
        ]);
        $attributes['id'] = 1;

        if($request->email === 'info@gmail.com'){
            $this->auth->attemt($attributes);
            header('location:/');
        }
        header('location:/login');
    }


}