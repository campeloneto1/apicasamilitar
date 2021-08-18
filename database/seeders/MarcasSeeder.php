<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Chevrolet'],
            1 => ['nome' => 'Toyota'],
            2 => ['nome' => 'Volkswagen'],
            3 => ['nome' => 'Ford'],
            4 => ['nome' => 'Honda'],
            5 => ['nome' => 'Nissan'],
            6 => ['nome' => 'Hyundai']
        ];
        DB::table('marcas')->insert($init);
    }
}
