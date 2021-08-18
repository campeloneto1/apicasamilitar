<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveisPostosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nivel_id' => 1, 'posto_id' => 11],
            1 => ['nivel_id' => 1, 'posto_id' => 2],
            2 => ['nivel_id' => 1, 'posto_id' => 4],
            3 => ['nivel_id' => 4, 'posto_id' => 1],
            4 => ['nivel_id' => 4, 'posto_id' => 2],
            5 => ['nivel_id' => 4, 'posto_id' => 3],
            6 => ['nivel_id' => 4, 'posto_id' => 4],
            7 => ['nivel_id' => 4, 'posto_id' => 5],
            8 => ['nivel_id' => 4, 'posto_id' => 6],
            9 => ['nivel_id' => 4, 'posto_id' => 7],
            10 => ['nivel_id' => 4, 'posto_id' => 8],
            11 => ['nivel_id' => 4, 'posto_id' => 9],
            12 => ['nivel_id' => 4, 'posto_id' => 10],
            12 => ['nivel_id' => 4, 'posto_id' => 11]
        ];
        DB::table('niveis_postos')->insert($init);
    }
}
