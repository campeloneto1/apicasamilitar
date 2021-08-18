<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeiculosTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Bicicleta'],
            2 => ['nome' => 'Ciclomotor'],
            3 => ['nome' => 'Motoneta'],
            4 => ['nome' => 'Motocicleta'],
            5 => ['nome' => 'Triciclo'],
            6 => ['nome' => 'Quadriciclo'],
            7 => ['nome' => 'Automóvel'],
            8 => ['nome' => 'Microônibus'],
            9 => ['nome' => 'Ônibus'],
            10 => ['nome' => 'Bonde'],
            11 => ['nome' => 'Reboque ou semi-reboque'],
            12 => ['nome' => 'Charrete']
        ];
        DB::table('veiculos_tipos')->insert($init);
    }
}
