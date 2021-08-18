<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('nome_guerra', 25)->nullable();
            $table->string('cpf', 15)->unique();
            $table->date('data_nascimento');
            $table->integer('posto_grad_id');
            
            $table->string('telefone1', 20);
            $table->string('telefone2', 20)->nullable();
            $table->string('email', 100)->unique();

            $table->string('cep', 10)->nullable();
            $table->integer('estado_id');
            $table->integer('cidade_id');

            $table->string('rua', 50);
            $table->string('numero', 10);
            $table->string('bairro', 50);
            $table->string('complemento', 100)->nullable();

            $table->integer('orgao_id')->nullable();
            $table->integer('setor_id')->nullable();
            $table->integer('funcao_id')->nullable();
            $table->integer('perfil_id');
            $table->integer('nivel_id');

            $table->string('observacao', 250)->nullable();
        
            $table->string('key', 100)->nullable();
            $table->string('digital', 100)->nullable();
            $table->string('foto', 100)->nullable();

            $table->string('usuario', 15)->unique();     
            $table->string('password', 100);
            $table->string('acesso')->default(1);

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
