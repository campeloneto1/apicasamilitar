<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Branco'],
            1 => ['nome' => 'Preto'],
            2 => ['nome' => 'Azul'],
            3 => ['nome' => 'Vermelho'],
            4 => ['nome' => 'Verde'],
            5 => ['nome' => 'Cinza'],
            6 => ['nome' => 'Marrom'],
            7 => ['nome' => 'Amarelo'],
            8 => ['nome' => 'Laranja']
        ];
        DB::table('cores')->insert($init);
    }
}
