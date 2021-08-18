<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id();
            $table->integer('manifestacao_id')->nullable();
            $table->integer('pessoa_id')->nullable();
            $table->integer('veiculo_id')->nullable();
            $table->integer('sindicato_id')->nullable();
            $table->string('nome', 100)->unique();   
            $table->integer('tipo_id');
            $table->date('data')->nullable();
            $table->time('hora')->nullable();


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
        Schema::dropIfExists('arquivos');
    }
}
