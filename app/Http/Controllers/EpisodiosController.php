<?php
namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;

class EpisodiosController
{
    public function index()
    {
        return Episodio::all();
    }
    public function show(int $id)
    {
        $episodio = Episodio::find($id);
        if(is_null($episodio)){
            return response()->json( '', 204);

        }
        return   response()->json( $episodio);

    }
    public function store(Request $request)
    {
       return response()->json( Episodio::create(["nome"=> $request->nome]), 201);
    }

    public function update(int $id, Request $request){
        $episodio = Episodio::find($id);
        if(is_null($episodio)){
            return response()->json(['erro' => 'recurso não encontrado']
                ,
             404);

        }
        $episodio->fill($request->all());
        $episodio->save();

        return $episodio;
    }

    public function destroy(int $id)
{
    $qtdRecursosRemovidos = Episodio::destroy($id);
    if ($qtdRecursosRemovidos === 0) {
        return response()->json([
            'erro' => 'Recurso não encontrado'
        ], 404);
    }

    return response()->json('', 204);
}

    
}