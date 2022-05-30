<?php

namespace App\Controllers;

use App\Models\User;
use khokonc\mvc\Request;

class HomeController extends Controller
{


    public function index()
    {
      
        return view('index');
    }


}
