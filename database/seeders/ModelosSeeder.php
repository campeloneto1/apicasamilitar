<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Trailblazer', 'marca_id' => 1],
            1 => ['nome' => 'SRV', 'marca_id' => 2],
            2 => ['nome' => 'SW4', 'marca_id' => 2],
            3 => ['nome' => 'Africa Twin', 'marca_id' => 5]
        ];
        DB::table('modelos')->insert($init);
    }
}
