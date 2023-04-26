<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prato;

class PratoController extends Controller
{
    public function index()
    {
        return Prato::all();
    }

    public function show($id)
    {
        $prato = Prato::findOrFail($id);

        if($prato)
            return $prato;

        return response()->json([
            'message' => 'Erro ao pesquisar o prato.'
        ], 404);
    }
}
