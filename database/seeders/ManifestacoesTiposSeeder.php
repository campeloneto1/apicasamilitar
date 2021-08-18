<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManifestacoesTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Funcionários da Saúde'],
            1 => ['nome' => 'Funcionários da Educação'],
            2 => ['nome' => 'Sem Terra']        
        ];
        DB::table('manifestacoes_tipos')->insert($init);
    }
}
