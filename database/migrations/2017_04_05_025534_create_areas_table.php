<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area', 100);
            $table->string('direccion', 100)->nullable();
            $table->integer('responsable_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('areas', function(Blueprint $table) {
            $table->foreign('responsable_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')
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
        Schema::drop('areas');
    }
}
