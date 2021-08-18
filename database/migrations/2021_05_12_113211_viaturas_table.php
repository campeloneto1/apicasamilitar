<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaturas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->nullable();
            $table->string('placa', 15)->unique();
            $table->string('renavam', 50)->nullable();
            $table->string('chassi', 50)->nullable();

            $table->integer('km_inicial');
            $table->integer('km_atual')->nullable();

            $table->integer('modelo_id');
            $table->integer('marca_id');
            $table->integer('veiculo_tipo_id');
            $table->integer('cor_id');

            $table->integer('orgao_id');
            $table->integer('setor_id');

            $table->string('observacao', 250)->nullable();

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
        Schema::dropIfExists('viaturas');
    }
}
