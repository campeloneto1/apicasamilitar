<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();   
            $table->boolean('administrador')->default(0);
            $table->boolean('gestor')->default(0);

            $table->boolean('acesso')->default(0);
            $table->boolean('c1')->default(0);   

            $table->boolean('relatorios')->default(0);    

            $table->boolean('estrategico')->default(0);         

            $table->boolean('users')->default(0);        
            $table->boolean('users_cad')->default(0);  
            $table->boolean('users_edit')->default(0);  
            $table->boolean('users_del')->default(0);
            $table->boolean('users_dig')->default(0);  
            $table->boolean('users_ace')->default(0); 
            $table->boolean('users_foto')->default(0);  

            $table->boolean('eventos')->default(0);        
            $table->boolean('eventos_cad')->default(0);  
            $table->boolean('eventos_edit')->default(0);  
            $table->boolean('eventos_del')->default(0); 
            $table->boolean('eventos_usu')->default(0); 
            $table->boolean('eventos_vei')->default(0); 

            $table->boolean('viaturas')->default(0);        
            $table->boolean('viaturas_cad')->default(0);  
            $table->boolean('viaturas_edit')->default(0);  
            $table->boolean('viaturas_del')->default(0); 

               

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
        Schema::dropIfExists('perfis');
    }
}
