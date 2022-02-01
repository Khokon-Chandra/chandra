<?php

namespace app\Controllers;

use core\Request;

class HomeController
{

    public function index()
    {

        return view('index', [
            'name' => 'Khokon Chandra',
        ]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'=>'required|min:5',
            'email' => 'required|unique:users',
        ]);
        return true;
    }
}
