<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
                        ->join('enderecos', 'enderecos.id', '=', 'restaurantes.id_endereco')
                        ->select('restaurantes.*', 'enderecos.*')
                        ->where('restaurantes.id', '=', $id)
                        ->get();

        if(!$restaurante) {
            return response()->json([
                'message' => 'Restaurante não encontrado!'
            ], 404);
        }

        if($restaurante)
            return $restaurante;

        return response()->json([
            'message' => 'Erro ao pesquisar o restaurante.'
        ], 500);
    }
}
