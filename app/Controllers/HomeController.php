<?php

namespace App\Controllers;

use khokonc\mvc\Request;

class HomeController extends Controller
{


    public function index()
    {    
     
        return view('index');
    }


}
