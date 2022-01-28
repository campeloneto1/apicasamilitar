<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GaragemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garagem', function (Blueprint $table) {
            $table->id();
           $table->integer('user_veiculo_id');         
           $table->integer('orgao_id'); 
           $table->integer('posto_id');         
           $table->date('data');
           $table->time('hora');   

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
        Schema::dropIfExists('garagem');
    }
}
