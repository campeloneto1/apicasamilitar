<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Administrador', 'administrador' => 1, 'gestor' => 1, 'acesso' => 1, 'c1' => 1, 'relatorios' => 1, 'estrategico' => 1, 'users' => 1, 'users_cad' => 1, 'users_del' => 1, 'users_edit' => 1, 'users_dig' => 1, 'users_ace' => 1, 'users_foto' => 1, 'eventos' => 1, 'eventos_cad' => 1, 'eventos_edit' => 1, 'eventos_del' => 1, 'eventos_usu' => 1, 'eventos_vei' => 1, 'viaturas' => 1, 'viaturas_cad' => 1, 'viaturas_edit' => 1, 'viaturas_del' => 1],
              1 => ['nome' => 'Usuários', 'administrador' => 0, 'gestor' => 0, 'acesso' => 0, 'c1' => 0, 'relatorios' => 0, 'estrategico' => 0, 'users' => 0, 'users_cad' => 0, 'users_del' => 0, 'users_edit' => 0, 'users_dig' => 0, 'users_ace' => 0, 'users_foto' => 0, 'eventos' => 0, 'eventos_cad' => 0, 'eventos_edit' => 0, 'eventos_del' => 0, 'eventos_usu' => 0, 'eventos_vei' => 0, 'viaturas' => 0, 'viaturas_cad' => 0, 'viaturas_edit' => 0, 'viaturas_del' => 0],
             2 => ['nome' => 'Gestor', 'administrador' => 0, 'gestor' => 1, 'acesso' => 1, 'c1' => 1, 'relatorios' => 1, 'estrategico' => 1, 'users' => 1, 'users_cad' => 1, 'users_del' => 1, 'users_edit' => 1, 'users_dig' => 1, 'users_ace' => 1, 'users_foto' => 1, 'eventos' => 1, 'eventos_cad' => 1, 'eventos_edit' => 1, 'eventos_del' => 1, 'eventos_usu' => 1, 'eventos_vei' => 1, 'viaturas' => 1, 'viaturas_cad' => 1, 'viaturas_edit' => 1, 'viaturas_del' => 1],
              3 => ['nome' => 'C1', 'administrador' => 0, 'gestor' => 0, 'acesso' => 0, 'c1' => 1, 'relatorios' => 0, 'estrategico' => 1, 'users' => 0, 'users_cad' => 0, 'users_del' => 0, 'users_edit' => 0, 'users_dig' => 0, 'users_ace' => 0, 'users_foto' => 0, 'eventos' => 0, 'eventos_cad' => 0, 'eventos_edit' => 0, 'eventos_del' => 0, 'eventos_usu' => 0, 'eventos_vei' => 0, 'viaturas' => 0, 'viaturas_cad' => 0, 'viaturas_edit' => 0, 'viaturas_del' => 0],
        ];
        DB::table('perfis')->insert($init);
    }
}
