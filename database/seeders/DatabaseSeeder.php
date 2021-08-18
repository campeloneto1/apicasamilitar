<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan migrate:fresh --seed
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	$this->call([UsuariosSeeder::class]);
        $this->call([PerfisSeeder::class]);
        $this->call([OrgaosSeeder::class]);
        $this->call([SetoresSeeder::class]);
        $this->call([FuncoesSeeder::class]);
        $this->call([PostosSeeder::class]);
        $this->call([EventosTiposSeeder::class]);
        $this->call([PostoGradSeeder::class]);
        $this->call([EventosSeeder::class]);
        $this->call([EventosUsuariosSeeder::class]);
        $this->call([EventosVeiculosSeeder::class]);
        $this->call([AcessosSeeder::class]);
        
        $this->call([NiveisSeeder::class]);
        $this->call([NiveisPostosSeeder::class]);

        $this->call([MarcasSeeder::class]);
        $this->call([ModelosSeeder::class]);
        $this->call([VeiculosTiposSeeder::class]);
        $this->call([VeiculosSeeder::class]);
        $this->call([ViaturasSeeder::class]);

        $this->call([PessoasSeeder::class]);
        $this->call([PessoasVeiculosManifestacoesSeeder::class]);

        $this->call([ManifestacoesTiposSeeder::class]);

        $this->call([InfluenciasSeeder::class]);
        $this->call([RedesSociaisSeeder::class]);
        $this->call([PessoasRedesSociaisSeeder::class]);

        $this->call([CoresSeeder::class]);
        $this->call([SindicatosSeeder::class]);
    }
}
