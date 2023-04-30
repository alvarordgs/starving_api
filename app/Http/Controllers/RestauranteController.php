<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{

    public function index()
    {
        $restaurantes = DB::table('restaurantes')
                        ->join('enderecos', 'enderecos.id', '=', 'restaurantes.id_endereco')
                        ->select('restaurantes.*', 'enderecos.*')
                        ->get();

        if($restaurantes)
            return $restaurantes;

        return response()->json([
            'message' => 'Erro ao encontrar o restaurante.'
        ], 404);
    }


    public function show($id)
    {
        $restaurante = DB::table('restaurantes')
                        ->join('enderecos', 'enderecos.id', '=', 'restaurantes.id_endereco')
                        ->select('restaurantes.*', 'enderecos.*')
                        ->where('restaurantes.id', '=', $id)
                        ->get();

        if($restaurante)
            return $restaurante;

        return response()->json([
            'message' => 'Erro ao encontrar o restaurante.'
        ], 404);
    }
}
