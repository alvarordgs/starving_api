<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Restaurante;

class RestauranteController extends Controller
{

    public function index()
    {
        return response()->json('Lista de restaurantes');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
