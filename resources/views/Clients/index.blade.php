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
        <th scope="col">Endereço</th>
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
            <td>{{$client->endereco}}</td>
            <td>
            <a class="btn btn-warning btm-lg text-white" href="{{ route('client.edit',[ $client->id ]) }}" role="button" aria-pressed="true">
                <i class="fal fa-pencil"></i>
                <span class='d-none d-md-inline'>Editar</span>
            </a>


            <span data-url="{{ route('client.destroy',[ $client->id ]) }}" data-idClient='{{ $client->id }}' class="btn btn-danger btm-lg text-white deleteButton" aria-pressed="true">
                <i class="fal fa-trash"></i>
                <span class='d-none d-md-inline'>Deletar</span>
            </span>

            </td>
        </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary" href="{{route('client.create')}}" role="button">Inserir Cliente</a>

@endsection
@push('scripts')
<script>

$('.deleteButton').on('click', function (e) {
        var url = $(this).data('url');
        var idClient = $(this).data('idClient');
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            method: 'DELETE',
            url: url
        });
        $.ajax({
            data: {
                'idClient': idClient,
            },
            success: function (data) {
                console.log(data);
                if (data['status'] ?? '' == 'success') {
                    if (data['reload'] ?? '') {
                        location.reload();
                    }
                } else {
                   console.log('error');
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>

@endpush