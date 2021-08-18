<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Nível 1'],
            1 => ['nome' => 'Nível 2'],
            2 => ['nome' => 'Nível 3'],
            3 => ['nome' => 'Nível 4']
        ];
        DB::table('niveis')->insert($init);
    }
}
