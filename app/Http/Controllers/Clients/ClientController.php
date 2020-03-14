<?php

namespace App\Http\Controllers\Clients;

use App\Http\Requests\clientStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\clientUpdateRequest;
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
        return redirect()->route('client.index');
    }

    public function destroy($id) {
        
        if(!empty($id)){
            $clientModel = app(Client::class);
            $client = $clientModel->find($id);
            if(!empty($client)){
                $client->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Cliente deletado com sucesso.',
                    'reload'  => true,
                ]);
            }
            else{
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Cliente não encontrado.',
                    'reload'  => true,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);

        }
    }

    public function edit($id) {
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        return view('Clients/edit',compact('client'));
    }

    public function update(clientUpdateRequest $request,$id){
        $data = $request->all();
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        $client->update([
            'name'=> $data['name'],
            'cpf'=>preg_replace("/[^A-Za-z0-9]/", "",$data['cpf']) ,
            'email'=>$data['email'],
            'endereco'=>$data['endereco'] ?? null,
           'active_flag'=> (($data['activebox'] ?? ' ') == null),
        ]);
        return redirect()->route('client.index');
    }



}


