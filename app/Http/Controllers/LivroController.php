<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Http\Requests\LivroRequest;

class LivroController extends Controller
{
    public function index(){
        $livros = Livro::all();
        return view('livros.index', [
            'livros' => $livros
        ]);
    }

    public function create(){
        return view('livros.create',[
            'livro' => new Livro,
        ]);
    }

    public function store(LivroRequest $request){
        $validated = $request->validated();
        $livro = Livro::create($validated);
        request()->session()->flash('alert-info','Livro cadastrado com sucesso');
        return redirect("/livros/{$livro->id}");
        //return redirect("/livros");
    }

   public function show(Livro $livro){
        return view('livros.show',[
            'livro' => $livro
        ]);
    }

    public function edit(Livro $livro){
        return view('livros.edit',[
            'livro' => $livro
        ]);
    }

    public function update(LivroRequest $request, Livro $livro){
        $validated = $request->validated();
        $livro->update($validated);
        request()->session()->flash('alert-info','Livro atualizado com sucesso');
        return redirect("/livros/{$livro->id}");
    }

    public function destroy(Livro $livro){
        $livro->delete();
        return redirect('/livros');
    }
}
