<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcessosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-11', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            1 => ['user_id' => 2, 'posto_id' => 11, 'data' => '2021-02-11', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            2 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-12', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            3 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-15', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            4 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-15', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            5 => ['user_id' => 2, 'posto_id' => 11, 'data' => '2021-02-16', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            6 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-16', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            7 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-17', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            8 => ['user_id' => 2, 'posto_id' => 11, 'data' => '2021-02-17', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            9 => ['user_id' => 2, 'posto_id' => 11, 'data' => '2021-02-18', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            10 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-18', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            11 => ['user_id' => 2, 'posto_id' => 11, 'data' => '2021-02-18', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1],
            12 => ['user_id' => 1, 'posto_id' => 11, 'data' => '2021-02-18', 'hora' => '16:00:00', 'created_by' => 1, 'orgao_id' => 1]
        ];
        DB::table('acessos')->insert($init);
    }
}
