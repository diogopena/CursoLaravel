<?php

namespace App\Http\Controllers\Clients;

use App\Http\Requests\clientStoreRequest;
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
        /*
        $clientModel = app(Client::class);
        $client = $clientModel->create([
            'name'=>'Teste2',
            'cpf'=>1234567899,
            'email'=>'teste2@teste.com',
            'active_flag'=>false
        ]);
        dd($client);
        */
        return view('Clients/create');               
    }

    public function store(clientStoreRequest $request) {
        $data = $request->all();
        $clientModel = app(Client::class);
        $client = $clientModel->create([
            'name' => $data['name'],
            'cpf' => preg_replace("/[^A-Za-z0-9]/", "", $data['cpf']) ,
            'email'=> $data['email'],
            'endereco' => $data['endereco'] ?? null,
            'active_flag' => isset($data['activebox']) ? true : false,
        ]);
    
    }
}


