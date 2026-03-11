<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Http\Requests\LivroRequest;

class LivroController extends Controller
{
    public function index(Request $request){
        if(isset($request->search)) {
            $livros = Livro::where('autor','LIKE',"%{$request->search}%")->orWhere('titulo','LIKE',"%{$request->search}%")->paginate(5);
        } else {
            $livros = Livro::paginate(5);
        }
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
        $validated['user_id'] = auth()->user()->id;
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
        $validated['user_id'] = auth()->user()->id;
        $livro->update($validated);
        request()->session()->flash('alert-info','Livro atualizado com sucesso');
        return redirect("/livros/{$livro->id}");
    }

    public function destroy(Livro $livro){
        $livro->delete();
        return redirect('/livros');
    }
}