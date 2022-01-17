<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nome');
            $table->string('Email')->unique();
            $table->string('password');
            $table->string('Ano');
            $table->string('TipoUser');
            $table->integer('acertosEletricidade');
            $table->integer('errosEletricidade');
            $table->integer('acertosEletronica');
            $table->integer('errosEletronica');
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
