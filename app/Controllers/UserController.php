<?php

namespace App\Controllers;

use App\Controllers\Controller;
use khokonc\mvc\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index',[
            'users' => app(User::class)->paginate(10)
        ]);

    }

    public function create()
    {
        return "create";
    }

    public function store()
    {
        return "store";
    }

    public function edit(Request $request,$id)
    {
        echo $id;
    }

    public function update($id)
    {
        return "update";
    }

    public function destroy($id)
    {
        return 'delete';
    }


}