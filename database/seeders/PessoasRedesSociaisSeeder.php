<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoasRedesSociaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['pessoa_id' => 1, 'rede_social_id' => 1, 'nome' => 'https://g1.globo.com/'],
            1 => ['pessoa_id' => 1, 'rede_social_id' => 2, 'nome' => 'https://globo.com/'],
            2 => ['pessoa_id' => 1, 'rede_social_id' => 3, 'nome' => 'https://google.com/'],
        ];
        DB::table('pessoas_redes_sociais')->insert($init);
    }
}
