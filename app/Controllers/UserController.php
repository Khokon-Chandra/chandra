<?php

namespace App\Controllers;

use app\Controllers\Controller;
use core\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'user list';
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