<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->text('rua');
            $table->text('numero')->nullable();
            $table->text('complemento')->nullable();
            $table->text('bairro');
            $table->text('cidade');
            $table->text('estado');
            $table->text('cep')->nullable();
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('drenagem_urbana')->nullable();
            $table->boolean('agua_potavel')->nullable();
            $table->boolean('coleta_tratamento_esgoto')->nullable();
            $table->boolean('coleta_residuos_solidos')->nullable();
            $table->boolean('solved')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
