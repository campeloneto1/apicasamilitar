<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $init = [
            0 => ['nome' => 'Inauguração de areninha', 'orgao_id' => 1, 'setor_id' => 1, 'evento_tipo_id' => 1, 'data' => '2021-02-28', 'hora' => '16:00:00', 'estado_id' => 6, 'cidade_id' => 756],
            1 => ['nome' => 'Operação carnaval', 'orgao_id' => 1, 'setor_id' => 2, 'evento_tipo_id' => 2, 'data' => '2021-02-18', 'hora' => '19:00:00', 'estado_id' => 6, 'cidade_id' => 756],
            2 => ['nome' => 'Operação eleições', 'orgao_id' => 1, 'setor_id' => 3, 'evento_tipo_id' => 3, 'data' => '2021-02-19', 'hora' => '10:00:00', 'estado_id' => 6, 'cidade_id' => 756]
        ];
        DB::table('eventos')->insert($init);
    }
}
