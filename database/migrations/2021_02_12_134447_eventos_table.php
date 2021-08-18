<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
           $table->integer('orgao_id'); 
           $table->integer('setor_id'); 
           $table->integer('evento_tipo_id'); 

           $table->integer('cidade_id'); 
           $table->integer('estado_id'); 
              
           $table->date('data');
           $table->time('hora');   

           $table->text('observacao')->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->timestamps();

            $table->unique(['nome', 'orgao_id', 'setor_id', 'data']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
