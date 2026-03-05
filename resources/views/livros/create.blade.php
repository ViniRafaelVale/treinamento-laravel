@extends('main')
@section('content')
<form method="POST" action="{{url('/livros')}}">
@csrf
@include('livros.partials.form')
</form>
@endsection