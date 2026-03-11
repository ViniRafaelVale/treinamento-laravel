@extends('main')
@section('content')

<form method="get" action="{{ url('/livros') }}">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" value="{{ request()->search }}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form> 
<br>
<hr />
<h1>Listagem de livros:</h1>
<br>

@forelse ($livros as $livro)

@include('livros.partials.fields')
<br>
@empty
    Não há livros cadastrados
@endforelse

<div class="d-flex justify-content-center">
{{ $livros->appends(request()->query())->links() }}
</div>

@endsection