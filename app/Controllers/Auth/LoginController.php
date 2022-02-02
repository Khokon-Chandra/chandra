<?php

namespace app\Controllers\Auth;

use app\Controllers\Controller;
use core\Auth;
use core\Request;

class LoginController extends Controller
{
    private $auth;
    public function __construct()
    {
        $this->middleware('guest');
        $this->auth = new Auth();
    }

    public function create()
    {    
        return view('index', [
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