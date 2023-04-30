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
        $id_cardapio = DB::table('cardapios')
            ->select('id')
            ->where('id_restaurante', '=', $id)
            ->get();

        if(!$id_cardapio) {
            return response()->json([
                'message' => 'Cardápio não encontrado para este restaurante.'
            ], 404);
        }

        $id_cardapio = $id_cardapio[0]->id;

        $pratos = DB::table('pratos')
        ->select('*')
        ->where('id_cardapio', '=', $id_cardapio);

        $bebidas = DB::table('bebidas')
            ->select('*')
            ->where('id_cardapio', '=', $id_cardapio);

        $cardapioComItems = $pratos->unionAll($bebidas)->get();

        if($cardapioComItems->count() > 0)
            return $cardapioComItems;

        return response()->json([
            'message' => 'Erro ao pesquisar o cardápio.'
        ], 500);
    }
}
