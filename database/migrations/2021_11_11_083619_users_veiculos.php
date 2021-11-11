<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersVeiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_veiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('marca_id');          
            $table->integer('modelo_id');
            $table->integer('cor_id');    
            $table->integer('veiculo_tipo_id');       
            $table->string('placa', 7);      
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
        Schema::dropIfExists('users_veiculos');
    }
}
