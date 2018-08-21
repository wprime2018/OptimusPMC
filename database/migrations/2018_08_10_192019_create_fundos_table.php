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
            $table->string('cnpj',20)->unique();
            $table->string('codigo',6)->unique();
            $table->string('fantasia',60)->unique();
            $table->string('razao_social',60);
            $table->string('natureza',60)->nullable();
            $table->string('tipo',1);
            $table->string('cep',10);
            $table->string('logradouro',40);
            $table->string('numero', 10)->length(10);
            $table->string('compl',30)->nullable();
            $table->string('bairro',30);
            $table->string('cidade',30);
            $table->string('estado',2);
            $table->Integer('ibge',false,true)->nullable();
            $table->string('ie', 20)->nullable();
            $table->string('im', 20)->nullable();
            $table->string('user_cad',40);
            $table->boolean('ativo');
            $table->index(['fantasia','razao_social']);
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
