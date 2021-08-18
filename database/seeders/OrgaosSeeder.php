<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgaosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => '1ª CPG'],
            1 => ['nome' => 'Casa MIlitar'],
            2 => ['nome' => 'Palácio da Abolição'],
            3 => ['nome' => 'Anexo do Palácio da Abolição'],
            4 => ['nome' => 'Vice-Governadoria'],
            5 => ['nome' => 'Residência Oficial']
        ];
        DB::table('orgaos')->insert($init);
    }
}
