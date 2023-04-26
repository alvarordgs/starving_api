<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\Prato;
use App\Models\Bebida;

class CardapioController extends Controller
{

    public function index()
    {
        return Cardapio::all();
    }

    public function show($id)
    {
        $pratos = DB::table('pratos')
            ->select('*')
            ->where('id_cardapio', '=', $id);

        $bebidas = DB::table('bebidas')
            ->select('*')
            ->where('id_cardapio', '=', $id);

        $cardapio = $pratos->unionAll($bebidas)->get();

        if($cardapio)
            return $cardapio;

        return response()->json([
            'message' => 'Erro ao pesquisar o cardápio.'
        ], 404);
    }






}
