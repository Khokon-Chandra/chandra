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
        return view('user.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit(Request $request,$id)
    {
        return view('user.edit',[
            'user' =>app(User::class)->where('id',$id)->first()
        ]);
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