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
        <th scope="col">Autor</th>
        <th scope="col">Numero de Páginas</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <th scope="row">{{$book->id}}</th>
            <td>{{$book->name}}</td>
            <td>{{$book->writer}}</td>
            <td>{{$book->page_number}}</td>
            <td>
           
            <span data-url="{{ route('book.destroy',[ $book->id ]) }}" data-idClient='{{ $book->id }}' class="btn btn-danger btm-lg text-white deleteButton" aria-pressed="true">
                <i class="fal fa-trash"></i>
                <span class='d-none d-md-inline'>Deletar</span>
            </span>

            </td>
        </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary" href="{{route('book.create')}}" role="button">Inserir Livro</a>

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