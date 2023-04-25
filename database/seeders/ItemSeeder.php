<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{

    public function run()
    {
        Item::create([
            'nome' => 'Coca cola lata 350ml',
            'tipo' => 'Bebida',
            'descricao' => 'Refrigerante lata',
            'valor' => 4.50,
            'imagem' => null,
        ]);
    }
}
