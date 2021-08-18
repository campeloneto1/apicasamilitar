<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedesSociaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Facebook'],
            1 => ['nome' => 'Instagram'],
            2 => ['nome' => 'Twitter']
        ];
        DB::table('redes_sociais')->insert($init);
        
    }
}
