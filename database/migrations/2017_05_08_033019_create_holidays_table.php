<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day', 10)->nullable();
            $table->string('reason', 100)->nullable();
            $table->string('details')->nullable();
            //FOREIGN KEYS
            $table->integer('config_agendas_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('holidays', function(Blueprint $table) {
            $table->foreign('config_agendas_id')
                ->references('id')
                ->on('config_agendas')
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
        Schema::drop('holidays');
    }
}
