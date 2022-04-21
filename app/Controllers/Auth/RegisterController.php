<?php

namespace App\Controllers\Auth;

use khokonc\mvc\Request;
use App\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    private $model;



    public function __construct()
    {
        $this->model = new User();
    }



    public function create()
    {

        return view('auth.register', [
            'pageTitle' => 'register',
            'name' => 'Khokon Chandra',
        ]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $attributes['password'] = password_hash($attributes['password'], PASSWORD_DEFAULT);
        $user = $this->model->create($attributes);
        $this->auth->attemt([
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'created_at' => $user->created_at,
        ]);
        $request->session->setFlashMessage('success', 'Successfully Registered');
        return redirect('/');
    }
}
