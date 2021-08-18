<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Reunião'],
            1 => ['nome' => 'Conferência'],
            2 => ['nome' => 'Congresso']
        ];
        DB::table('eventos_tipos')->insert($init);
    }
}
