<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('mensaje');
            $table->date('fecha');
            $table->string('usuario_username', 25);
            $table->integer('post_id');
            $table->integer('comentario_id')->nullable();
            $table->foreign('usuario_username')->references('username')->on('usuarios')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('postdibujos')->onDelete('cascade');
        });

        //Ejecutamos esta sentencia por separado una vez creada la tabla comentarios ya que no permite hacer todo de una.
        Schema::table('comentarios', function (Blueprint $table) {
            $table->foreign('comentario_id')->references('id')->on('comentarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
