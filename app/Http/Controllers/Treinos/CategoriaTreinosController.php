<?php

namespace App\Http\Controllers\Treinos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Treinos\CategoriaTreinos;
use Carbon\Carbon;

class CategoriaTreinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria_treino = CategoriaTreinos::orderBy('nome_categoria_treino', 'ASC')->paginate(6);

        return view('app.treinos.categorias.index', compact('categoria_treino'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_categoria_treino' => 'required'
        ], [
            'nome_categoria_treino.required' => 'Adicione uma categoria'
        ]);

        CategoriaTreinos::insert([
            'nome_categoria_treino' => $request->nome_categoria_treino,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('categoria.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\CategoriaTreinos  $categoriaTreinos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaTreinos = CategoriaTreinos::findOrFail($id);

        return view('app.treinos.categorias.edit', compact('categoriaTreinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\CategoriaTreinos  $categoriaTreinos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_categoria_treino' => 'required'
        ], [
            'nome_categoria_treino.required' => 'Adicione uma categoria'
        ]);

        CategoriaTreinos::findOrFail($id)->update([
            'nome_categoria_treino' => $request->nome_categoria_treino,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\CategoriaTreinos  $categoriaTreinos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriaTreinos::findOrFail($id)->delete();
        
        return redirect()->route('categoria.index');
    }
}
