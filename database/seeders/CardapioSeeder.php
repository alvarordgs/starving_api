<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cardapio;

class CardapioSeeder extends Seeder
{

    public function run()
    {
        Cardapio::create([
            'nome' => 'Cardápio 2023',
            'descricao' => 'Cadápio cheio de novidades e pratos deliciosos.'
        ]);
    }
}
