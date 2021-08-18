<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_users', function (Blueprint $table) {
            $table->id();
            $table->integer('evento_id');
            $table->integer('user_id');
            $table->integer('tipo_id')->nullable();

            $table->boolean('presente')->nullable();
            $table->date('data')->nullable();
            $table->time('hora')->nullable();
           
            $table->string('key', 100)->nullable();
           
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->timestamps();

            $table->unique(['evento_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('eventos_users');
    }
}
