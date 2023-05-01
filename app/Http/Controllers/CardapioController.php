<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cardapio;

class CardapioController extends Controller
{

    public function index()
    {
        //
    }

    public function show($id)
    {
        $id_cardapio = DB::table('cardapios')
                        ->select('id')
                        ->where('id_restaurante', '=', $id)
                        ->first();

        if(!$id_cardapio) {
            return response()->json([
                'message' => 'Cardápio não encontrado para este restaurante.'
            ], 404);
        }

        $id_cardapio = $id_cardapio->id;

        $produtos = DB::table('produtos')
                    ->select('*')
                    ->where('id_cardapio', '=', $id_cardapio)
                    ->get()
                    ->toArray();

        if($produtos)
            return $produtos;

        return response()->json([
            'message' => 'Erro ao pesquisar o cardápio.'
        ], 500);
    }

    public function todoscardapios() {
        $produtos = DB::table('produtos')
                ->join('cardapios', 'cardapios.id', '=', 'produtos.id_cardapio')
                ->join('restaurantes', 'restaurantes.id', '=', 'cardapios.id_restaurante')
                ->select('produtos.*', 'cardapios.nome AS nome_cardapio', 'cardapios.id_restaurante AS id_restaurante', 'restaurantes.nome AS nome_restaurante')
                ->get();

        if($produtos)
            return $produtos;

        return response()->json([
            'message' => 'Erro ao pesquisar o cardápio.'
        ], 500);
    }
}
