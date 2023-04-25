<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurante;

class RestauranteSeeder extends Seeder
{

    public function run()
    {
        Restaurante::create([
            'nome' => 'Cantina',
            'descricao' => 'Melhor restaurante de comida brasileira',
            'telefone' => '(34) 9 9999-9999',
            'imagem' => null,
        ]);
    }
}
