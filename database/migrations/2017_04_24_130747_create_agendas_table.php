<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('responsable_id')->unsigned();
            $table->string('direccion', 100)->nullable();
            $table->integer('motivo')->nullable();
            $table->integer('area_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('agendas', function(Blueprint $table) {
            $table->foreign('responsable_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::drop('agendas');
    }
}
