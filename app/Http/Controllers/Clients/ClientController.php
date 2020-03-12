<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index() {
        $clientModel = app(Client::class);
        
        $clients =$clientModel->all();
        //$clients =$clientModel->find(1);
        //$clients =$clientModel->where('cpf',1234567891)->get();
        return view('Clients/index', compact('clients'));
    }

    public function create() {
        $clientModel = app(Client::class);
        $client = $clientModel->create([
            'name'=>'Teste2',
            'cpf'=>1234567899,
            'email'=>'teste2@teste.com',
            'active_flag'=>false
        ]);
        dd($client);               
    }
}


