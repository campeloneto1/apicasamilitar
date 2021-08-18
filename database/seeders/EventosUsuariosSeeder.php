<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['evento_id' => 1, 'user_id' => 1, 'tipo_id' => 1],
            1 => ['evento_id' => 1, 'user_id' => 2, 'tipo_id' => 1],
            2 => ['evento_id' => 2, 'user_id' => 1, 'tipo_id' => 1]
        ];
        DB::table('eventos_users')->insert($init);
    }
}
