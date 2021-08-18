<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => ['nome' => 'Jose de Barros Campelo Neto', 'cpf' => '05906219471', 'usuario' => '05906219471', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 1, 'email' => 'pmcebarros@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 1, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 1, 'digital' => '23123123', 'foto' => '118022021134428.jpg'],
            1 => ['nome' => 'Marcos Paulo', 'cpf' => '05906219472', 'usuario' => '05906219472', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 1, 'email' => 'pmcebarro2@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 1, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             2 => ['nome' => 'Pedro', 'cpf' => '05906219473', 'usuario' => '05906219473', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 7, 'email' => 'pmcebarro3@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             3 => ['nome' => 'Guilherme', 'cpf' => '05906219474', 'usuario' => '05906219474', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 1, 'email' => 'pmcebarro4@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             4 => ['nome' => 'Alberto', 'cpf' => '05906219475', 'usuario' => '05906219475', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 7, 'email' => 'pmcebarro5@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             5 => ['nome' => 'Vinicius', 'cpf' => '05906219476', 'usuario' => '05906219476', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 1, 'email' => 'pmcebarro6@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             6 => ['nome' => 'Alexandre', 'cpf' => '05906219477', 'usuario' => '05906219477', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 2, 'email' => 'pmcebarro7@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             7 => ['nome' => 'Rodrigues', 'cpf' => '05906219478', 'usuario' => '05906219478', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 2, 'email' => 'pmcebarro8@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             8 => ['nome' => 'Moreira', 'cpf' => '05906219479', 'usuario' => '05906219479', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 3, 'email' => 'pmcebarro9@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             9 => ['nome' => 'Lopes', 'cpf' => '05906219481', 'usuario' => '05906219481', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 4, 'email' => 'pmcebarro11@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => ''],
             10 => ['nome' => 'Luciana', 'cpf' => '05906219480', 'usuario' => '05906219480', 'password' => bcrypt('123456'), 'data_nascimento' => '1991-05-16', 'posto_grad_id' => 5, 'email' => 'pmcebarro10@gmail.com', 'telefone1' => '88999492036', 'estado_id' => '6', 'cidade_id' => '756', 'rua' => 'rua 1', 'numero' => 1, 'bairro' => 'coco', 'orgao_id' => 1, 'setor_id' => 1, 'perfil_id' => 2, 'funcao_id' => 1, 'nivel_id' => 1, 'acesso' => 0, 'digital' => '', 'foto' => '']
        ];
        DB::table('users')->insert($init);
    }
}
