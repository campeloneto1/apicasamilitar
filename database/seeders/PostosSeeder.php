<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Posto 01', 'orgao_id' => 3, 'acesso' => 0],
            1 => ['nome' => 'Posto 02', 'orgao_id' => 3, 'acesso' => 0],
            2 => ['nome' => 'Posto 03', 'orgao_id' => 3, 'acesso' => 0],
            3 => ['nome' => 'Bravo 01', 'orgao_id' => 4, 'acesso' => 0],
            4 => ['nome' => 'Bravo 02', 'orgao_id' => 3, 'acesso' => 1],
            5 => ['nome' => 'Bravo 03', 'orgao_id' => 3, 'acesso' => 0],
            6 => ['nome' => 'Bravo 04', 'orgao_id' => 3, 'acesso' => 0],
            7 => ['nome' => 'Bravo 05', 'orgao_id' => 3, 'acesso' => 0],
            8 => ['nome' => 'Bravo G', 'orgao_id' => 6, 'acesso' => 0],
            9 => ['nome' => 'Bravo R', 'orgao_id' => 6, 'acesso' => 1],
            10 => ['nome' => 'Permanente', 'orgao_id' => 1, 'acesso' => 1]
        ];
        DB::table('postos')->insert($init);
    }
}
