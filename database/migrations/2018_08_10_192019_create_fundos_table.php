<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj',20);
            $table->string('fantasia',30);
            $table->string('razao_social',60);
            $table->string('cep',9);
            $table->string('logradouro',40);
            $table->integer('numero', false, true)->length(8);
            $table->string('compl',30)->nullable();
            $table->string('bairro',30);
            $table->string('cidade',30);
            $table->string('estado',2);
            $table->Integer('ibge',false,true);
            $table->string('ie', 20)->nullable();
            $table->string('im', 20)->nullable();
            $table->boolean('ativo');
            $table->index(['fantasia','razao_social']);
            $table->unique('cnpj');            
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
        Schema::dropIfExists('fundos');
    }
}
