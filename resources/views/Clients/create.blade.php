@extends('Layouts/LayoutFull')

@push('css')
@endpush
@section('conteudo')
<form>
    <div class="form-group">
        <label>Nome: </label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label >CPF: </label>
        <div class="form-control">
        <input type="text" class="cpf-mask">
        </div>
    </div>
    <div class="form-group">
        <label >E-mail: </label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label >Endereço: </label>
        <input type="text" class="form-control">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Gravar!</button>
</form>
@endsection
@push('scripts')    
<script>
    $(".cpf-mask").mask('000.000.000-00')
</script>
@endpush
