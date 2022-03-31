<?php

namespace app\Controllers;

use core\Request;
use app\Models\Client;

class ClientController extends Controller
{


    public function index()
    {    
     
        return view('client.index',[
            'clients' => app(Client::class)->all(),
        ]);
        
    }


}
