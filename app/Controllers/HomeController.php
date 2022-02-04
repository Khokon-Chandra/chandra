<?php

namespace app\Controllers;

use core\Request;

class HomeController extends Controller
{


    public function index()
    {    
     
        return view('index');
    }


    public function store(Request $request)
    {
       
    }
}
