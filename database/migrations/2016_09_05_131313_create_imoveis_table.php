<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->enum('status', ['vende', 'aluga']);
            $table->string('endereco')->nullable();
            $table->string('cep')->nullable();
            $table->decimal('valor', 13, 2);
            $table->integer('dormitorios')->nullable();
            $table->string('detalhes')->nullable();
            $table->longText('mapa')->nullable();
            $table->bigInteger('visualizacoes')->default(0);
            $table->tinyInteger('publicar')->default(1);
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
        Schema::drop('imoveis');
    }
}
