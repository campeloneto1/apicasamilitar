<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $init = [
            0 => ['nome' => 'Comandante'],
            1 => ['nome' => 'SubComandante'],
            2 => ['nome' => 'Administrativo'],
            3 => ['nome' => 'Operacional']
        ];
        DB::table('funcoes')->insert($init);
    }
}
