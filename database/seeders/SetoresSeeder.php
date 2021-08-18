<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Ostensivo', 'orgao_id' => 1, 'andar_id' => 1],
            1 => ['nome' => 'Segurança', 'orgao_id' => 1, 'andar_id' => 2],
            2 => ['nome' => 'Estratégico', 'orgao_id' => 1, 'andar_id' => 2],
            3 => ['nome' => 'Cerimonial', 'orgao_id' => 1, 'andar_id' => 1],
            4 => ['nome' => 'Transporte', 'orgao_id' => 1, 'andar_id' => 1]
        ];
        DB::table('setores')->insert($init);
    }
}
