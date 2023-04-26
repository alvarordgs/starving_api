<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebida;

class BebidaController extends Controller
{
    public function index()
    {
        return Bebida::all();
    }

    public function show($id)
    {
        $bebida = Bebida::findOrFail($id);

        if($bebida)
            return $bebida;

        return response()->json([
            'message' => 'Erro ao pesquisar a bebida.'
        ], 404);
    }
}
