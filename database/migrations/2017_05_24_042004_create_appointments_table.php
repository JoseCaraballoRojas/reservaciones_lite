<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appointment')->nullable();
            $table->string('date')->nullable();
            //FOREIGN KEYS
            $table->integer('agenda_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('appointments', function(Blueprint $table) {
            $table->foreign('agenda_id')
                ->references('id')
                ->on('agendas')
                ->onDelete('cascade');

            $table->foreign('cliente_id')
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
        Schema::drop('appointments');
    }
}
