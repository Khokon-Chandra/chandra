<?php

namespace app\Controllers;

use app\Models\Newsletters;
use core\Request;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->model = new Newsletters();
    }

    public function index()
    {    
        return view('news_letter');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required'
        ]);

        $create = $this->model->create([
            'email'=>$request->email,
            'ip' => $request->ip(),
            'created_at' => date('Y-m-d H:s:i')
        ]);
        return "Successfully record inserted";
    }


}
