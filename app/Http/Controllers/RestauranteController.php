<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{

    public function index()
    {
        return Restaurante::all();
    }


    public function show($id)
    {
        $restaurante = DB::table('restaurantes')
            ->join('enderecos', 'restaurantes.id_endereco', '=', 'enderecos.id')
            ->select('restaurantes.*', 'enderecos.*')
            ->where('restaurantes.id', '=', $id);

        if($restaurante)
            return $restaurante;

        return response()->json([
            'message' => 'Erro ao pesquisar o restaurante.'
        ], 404);
    }

}
