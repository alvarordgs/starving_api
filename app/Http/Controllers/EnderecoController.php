<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;

class EnderecoController extends Controller
{

    public function index()
    {
        return Endereco::all();
    }


    public function show($id)
    {
        $endereco = Endereco::findOrFail($id);

        if($endereco)
            return $endereco;

        return response()->json([
            'message' => 'Erro ao pesquisar o endereço.'
        ], 404);
    }

}
