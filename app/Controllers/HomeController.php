<?php

namespace app\Controllers;

use core\Request;

class HomeController extends Controller
{


    public function index()
    {    
     
        return "This is home page";
    }


    public function store(Request $request)
    {
       
    }
}
