<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('direccion', 100)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('estado', 100)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('logo', 100)->nullable();
            $table->integer('contacto1_id')->unsigned();
            $table->integer('contacto2_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('empresas', function(Blueprint $table) {
            $table->foreign('contacto1_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('contacto2_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresas');
    }
}
