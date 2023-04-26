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
        $restaurante = Restaurante::findOrFail($id);

        if($restaurante)
            return $restaurante;

        return response()->json([
            'message' => 'Erro ao pesquisar o restaurante.'
        ], 404);
    }

}
