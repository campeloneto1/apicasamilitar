<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventosVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_viaturas', function (Blueprint $table) {
            $table->id();
            $table->integer('evento_id');
            $table->integer('viatura_id');

            $table->integer('km_inicial');
            $table->integer('km_final')->nullable();
           
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->timestamps();

            $table->unique(['evento_id', 'viatura_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos_veiculos');
    }
}
