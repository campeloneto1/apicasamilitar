<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Auditório', 'orgao_id' => 1, 'andar_id' => 1],
            1 => ['nome' => 'Sala de Aula', 'orgao_id' => 1, 'andar_id' => 1],
            2 => ['nome' => 'Auditório', 'orgao_id' => 2, 'andar_id' => 1],
            3 => ['nome' => 'Auditório', 'orgao_id' => 3, 'andar_id' => 1],
            4 => ['nome' => 'Auditório', 'orgao_id' => 4, 'andar_id' => 1]
        ];
        DB::table('locais')->insert($init);
    }
}
