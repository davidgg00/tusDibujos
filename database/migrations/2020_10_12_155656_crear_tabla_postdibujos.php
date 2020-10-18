<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPostdibujos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postdibujos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('img_url');
            $table->date('fecha');
            $table->integer('valoracion');
            $table->string('usuario_username', 25);

            $table->foreign('usuario_username')->references('username')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postdibujos');
    }
}
