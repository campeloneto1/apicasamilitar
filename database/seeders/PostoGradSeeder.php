<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostoGradSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Soldado'],
            1 => ['nome' => 'Cabo'],
            2 => ['nome' => '3º Sargento'],
            3 => ['nome' => '2º Sargento'],
            4 => ['nome' => '1º Sargento'],
            5 => ['nome' => 'SubTenente'],
            6 => ['nome' => '2º Tenente'],
            7 => ['nome' => '1º Tenente'],
            8 => ['nome' => 'Capitão'],
            9 => ['nome' => 'Major'],
            10 => ['nome' => 'Tenente-Coronel'],
            11 => ['nome' => 'Coronel'],
            12 => ['nome' => 'Civil']
        ];
        DB::table('posto_grads')->insert($init);
    }
}
