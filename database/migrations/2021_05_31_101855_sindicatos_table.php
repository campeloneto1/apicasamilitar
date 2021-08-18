<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SindicatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sindicatos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_id');
            $table->string('nome', 100)->unique();           
            
            $table->string('telefone1', 20)->nullable();
            $table->string('telefone2', 20)->nullable();
            $table->string('email', 100)->unique()->nullable();

            $table->string('cep', 10)->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('cidade_id')->nullable();

            $table->string('rua', 50)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('complemento', 100)->nullable();

            $table->text('observacao')->nullable();
        
            $table->string('key', 100)->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

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
        Schema::dropIfExists('sindicatos');
    }
}
