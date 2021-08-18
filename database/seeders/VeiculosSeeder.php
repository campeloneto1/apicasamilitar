<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['placa' => 'PPO0001', 'renavam' => '0000000001', 'marca_id' => 1, 'modelo_id' => 1, 'veiculo_tipo_id' => 7, 'cor_id' => 1],
            1 => ['placa' => 'PPQ0002', 'renavam' => '0000000002', 'marca_id' => 2, 'modelo_id' => 2, 'veiculo_tipo_id' => 7, 'cor_id' => 1]
            

        ];
        DB::table('veiculos')->insert($init);
    }
}
