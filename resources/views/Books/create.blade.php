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
    <form method="POST" action="{{route('book.store')}}" class="form-horizontal form-validade">
        {{csrf_field()}}
        
        <div class="form-group">
            <label >Nome: </label>
            <input id="name" name="name" required type="text" class="form-control" value="{{old("name")}}">
        </div>
        <div class="form-group">
            <label >Autor: </label>
            <input id="writer" name="writer"type="text" class="form-control" value="{{old("writer")}}">
        </div>
        <div class="form-group">
            <label >Número de páginas: </label>
            <input id="page_number" name="page_number" type="text" class="form-control" value="{{old("page_number")}}">
        </div>
        <button type="submit" class="btn btn-primary">Gravar!</button>
    </form>
@endsection
@push('scripts')    
@endpush
