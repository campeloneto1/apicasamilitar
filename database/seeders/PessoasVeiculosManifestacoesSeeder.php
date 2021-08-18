<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoasVeiculosManifestacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $init = [
            0 => ['pessoa_id' => 1, 'veiculo_id' => 1],
            1 => ['pessoa_id' => 1, 'veiculo_id' => 2]
        ];
        DB::table('pessoas_veiculos_manifestacoes')->insert($init);
    }
}
