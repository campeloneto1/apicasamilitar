<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViaturasSeeder extends Seeder
{
   
         /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['placa' => 'CCM0001', 'renavam' => '0000000001', 'orgao_id' => 1, 'setor_id' => 5, 'marca_id' => 1, 'modelo_id' => 1, 'veiculo_tipo_id' => 7, 'cor_id' => 1, 'km_inicial' => 100, 'km_atual' => 100],
            1 => ['placa' => 'CCM0002', 'renavam' => '0000000002', 'orgao_id' => 1, 'setor_id' => 5, 'marca_id' => 2, 'modelo_id' => 2, 'veiculo_tipo_id' => 7,'cor_id' => 1, 'km_inicial' => 100, 'km_atual' => 100],
            2 => ['placa' => 'CCM0003', 'renavam' => '0000000003', 'orgao_id' => 1, 'setor_id' => 5, 'marca_id' => 2, 'modelo_id' => 3, 'veiculo_tipo_id' => 7,'cor_id' => 1, 'km_inicial' => 100, 'km_atual' => 100],
            3 => ['placa' => 'CCM0004', 'renavam' => '0000000004', 'orgao_id' => 1, 'setor_id' => 5, 'marca_id' => 5, 'modelo_id' => 4, 'veiculo_tipo_id' => 4,'cor_id' => 1, 'km_inicial' => 100, 'km_atual' => 100]

        ];
        DB::table('viaturas')->insert($init);
    }
}
