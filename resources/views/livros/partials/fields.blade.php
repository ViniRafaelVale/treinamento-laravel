<ul>
    <li>{{ $livro->titulo ?? '' }}</li>
    <li>{{ $livro->autor ?? '' }}</li>
    <li>{{ $livro->isbn ?? '' }}</li>
    <li><a href="{{url('/livros/' . $livro->id . '/edit')}}">Editar</a></li>
    <li>
        <form action="{{url('/livros/' . $livro->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
        </form>
    </li> 
</ul>
