<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SindicatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Teste 1', 'tipo_id' => 1],
            1 => ['nome' => 'Teste 2', 'tipo_id' => 2],
            2 => ['nome' => 'Teste 3', 'tipo_id' => 1]
        ];
        DB::table('sindicatos')->insert($init);
    }
}
