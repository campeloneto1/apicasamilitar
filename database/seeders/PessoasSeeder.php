<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'José', 'cpf' => '00000000001'],
            1 => ['nome' => 'Maria', 'cpf' => '00000000002'],
            2 => ['nome' => 'Pedro', 'cpf' => '00000000003'],
            3 => ['nome' => 'Gustavo', 'cpf' => '00000000004']
        ];
        DB::table('pessoas')->insert($init);
    }
}
