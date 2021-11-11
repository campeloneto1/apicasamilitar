<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersVeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $init = [
            0 => ['user_id' => 1, 'veiculo_tipo_id' => 1, 'marca_id' => 1, 'modelo_id' => 1, 'cor_id' => 1, 'placa' => 'pmg8616'],
            1 => ['user_id' => 2, 'veiculo_tipo_id' => 1, 'marca_id' => 1, 'modelo_id' => 1, 'cor_id' => 1, 'placa' => 'pmg8617'],
            2 => ['user_id' => 1, 'veiculo_tipo_id' => 1, 'marca_id' => 1, 'modelo_id' => 1, 'cor_id' => 1, 'placa' => 'pmg8618'],
        ];
        DB::table('users_veiculos')->insert($init);
    }
}
