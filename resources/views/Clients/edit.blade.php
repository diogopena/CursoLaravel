@extends('Layouts/LayoutFull')

@push('css')
@endpush
@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('client.update',[$client->id])}}" class="form-horizontal form-validade">
        {{csrf_field()}}
        @method('PUT')
        <div style='text-align:center;'>
            <div>
                <label>Ativo? </label>
                <input id="activebox" name="activebox" type="checkbox" @if($client->active_flag) checked='checked' @endif >
            </div>
        </div>
        <div class="form-group">
            <label >Nome: </label>
            <input id="name" name="name" required type="text" class="form-control" value="{{old("name",$client->name)}}">
        </div>
        <div class="form-group">
            <label >CPF: </label>
            <input id="cpf" name="cpf"type="text" class="cpf-mask" value="{{old("cpf",$client->cpf)}}">
        </div>
        <div class="form-group">
            <label >E-mail: </label>
            <input id="email" name="email" type="text" class="form-control" value="{{old("email",$client->email)}}">
        </div>
        <div class="form-group">
            <label >Endereço: </label>
            <input id="endereco" name="endereco" type="text" class="form-control" value="{{old("endereco",$client->endereco)}}">
        </div>
        <button type="submit" class="btn btn-primary">Gravar!</button>
    </form>
@endsection
@push('scripts')    
<script>
    $(".cpf-mask").mask('000.000.000-00')
</script>
@endpush
