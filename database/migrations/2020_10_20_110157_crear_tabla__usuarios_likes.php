<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuariosLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuariosLikes', function (Blueprint $table) {
            $table->string('usuario_username', 25);
            $table->integer('post_id');
            $table->dateTime('fecha');
            $table->foreign('usuario_username')->references('username')->on('usuarios')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('postdibujos')->onDelete('cascade');

            $table->primary(array('usuario_username', 'post_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UsuariosLikes');
    }
}
