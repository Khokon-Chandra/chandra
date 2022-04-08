<?php

namespace App\Controllers;

use app\Controllers\Controller;
use app\Models\City;
use app\Models\Client;
use app\Models\Country;
use core\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {

        $types = [
            10 => "10-customer_type1",
            20 => "20-customer_type2",
        ];

        $status = [
            600 => "600-Überprüfen",
            650 => "650-Abklärung",
            720 => "720-Akzeptiert",
            5000 => "5000-Gesperrt",
        ];

        return view('client.index', [
            'types' => $types,
            'status' => $status,
            'countries' => app(Country::class)->all(),
            'cities' => app(City::class)->all(),
            'clients' => app(Client::class)->with('country', 'city', 'notes', 'sections', 'linkCp', 'linkSp')->filter($request)->paginate(15)
        ]);
    }

    public function search(Request $request)
    {

        return view('client._list', [
            'clients' => app(Client::class)->with('country', 'city', 'notes', 'sections', 'linkCp', 'linkSp')->filter($request)->paginate($request->count ?? 15)
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
