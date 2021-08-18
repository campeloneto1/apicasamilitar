<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosVeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['evento_id' => 1, 'viatura_id' => 1, 'km_inicial' => 100],
            1 => ['evento_id' => 1, 'viatura_id' => 2, 'km_inicial' => 100],
            2 => ['evento_id' => 2, 'viatura_id' => 1, 'km_inicial' => 100]
        ];
        DB::table('eventos_viaturas')->insert($init);
    }
}
