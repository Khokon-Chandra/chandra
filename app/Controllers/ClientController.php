<?php

namespace App\Controllers;

use app\Controllers\Controller;
use app\Models\Client;
use core\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        return view('client.index', [
            'clients' => app(Client::class)->filter($request)->paginate(15)
        ]);
    }

    public function search(Request $request)
    {

        return view('client._list', [
            'clients' => app(Client::class)->filter($request)->paginate($request->count ?? 15)
        ]);
    }

    public function create()
    {
        return "create";
    }

    public function store(Request $request)
    {
        return $_POST['_token'];
        return "store";
    }

    public function edit(Request $request, $id)
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
