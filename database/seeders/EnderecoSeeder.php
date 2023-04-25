<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Endereco;

class EnderecoSeeder extends Seeder
{

    public function run()
    {
        Endereco::create([
            'rua' => 'Rua 1',
            'numero' => 100,
            'bairro' => 'Jd. Esperança',
            'cidade' => 'Uberaba',
            'estado' => 'MG'
        ]);
    }
}
