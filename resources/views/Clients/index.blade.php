@extends('Layouts/LayoutFull')

@push('css')
@endpush

@if(Session::has('success'))
    toastr["sucess"]("<b>Sucesso: </b> {{ Session::get('sucess') }}");
@endif

@section('conteudo')

<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#id</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">E-mail</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <th scope="row">{{$client->id}}</th>
            <td>{{$client->name}}</td>
            <td>{{$client->cpf}}</td>
            <td>{{$client->email}}</td>
            <td>
            <a class="btn btn-primary btm-sm active" href="" role="button" aria-pressed="true">Editar</a>
            <a class="btn btn-danger btm-sm active" href="" role="button" aria-pressed="true">Apagar</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary" href="{{route('client.create')}}" role="button">Inserir Cliente</a>
@endsection
@push('scripts')    
@endpush
