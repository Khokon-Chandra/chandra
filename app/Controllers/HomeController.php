<?php

namespace app\Controllers;

use core\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {    
        return "This is home page";
    }


    public function store(Request $request)
    {
       
    }
}
