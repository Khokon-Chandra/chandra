<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use khokonc\mvc\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->model = new User();
    }

    public function create()
    {

        

        return view('auth.login', [
            'pageTitle' => 'Login',
            'name' => 'Khokon Chandra',
        ]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);

        $user = $this->model->where('email', $request->email)->first();

        if (password_verify($request->password, $user->password)) {
            $this->auth->attemt([
                'id'         => $user->id,
                'name'       => $user->name,
                'email'      => $user->email,
                'created_at' => $user->created_at,
            ]);
            $request->session->setFlashMessage('success', 'Successfully Loged in');
            return redirect('/');
        }
        $this->session->setFlashMessage('errors', ['email'=>'credential mis-match']);
        return redirect('/login');
    }


    public function destroy(Request $request)
    {
        $this->auth->logout();
        return redirect()->route('login.create');
    }
}
