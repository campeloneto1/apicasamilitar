<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfluenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $init = [
            0 => ['nome' => 'Presidente'],
            1 => ['nome' => 'Governador'],
            2 => ['nome' => 'Vice-Governador']
        ];
        DB::table('influencias')->insert($init);
    }
}
