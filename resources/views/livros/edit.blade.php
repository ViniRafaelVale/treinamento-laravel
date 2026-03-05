@extends('main')
@section('content')
<form method="POST" action="{{url('/livros/' . $livro->id)}}">
@csrf
@method('patch')
@include('livros.partials.form')
</form>
@endsection