<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\bookStoreRequest;

class bookController extends Controller
{
    public function index() {
        $bookModel = app(Book::class);
        
        $books =$bookModel->all();
        //$clients =$clientModel->find(1);
        //$clients =$clientModel->where('cpf',1234567891)->get();
        return view('Books/index', compact('books'));
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
        return view('Books/create');               
    }
    public function store(bookStoreRequest $request) {
        $data = $request->all();
        $bookModel = app(Book::class);
        $book = $bookModel->create([
            'name' => $data['name'],
            'writer' => $data['writer'],
            'page_number'=> $data['page_number'],
        ]);
        return redirect()->route('book.index');
    }

    public function destroy($id) {
        
        if(!empty($id)){
            $bookModel = app(Book::class);
            $book = $bookModel->find($id);
            if(!empty($book)){
                $book->delete();
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

}
