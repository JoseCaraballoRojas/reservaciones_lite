<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('monday',10)->nullable();
            $table->string('tuesday',10)->nullable();
            $table->string('wednesday',10)->nullable();
            $table->string('thursday',10)->nullable();
            $table->string('friday',10)->nullable();
            $table->string('saturday',10)->nullable();
            $table->string('sunday',10)->nullable();
            //FOREIGN KEYS
            $table->integer('config_agendas_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('working_days', function(Blueprint $table) {
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
        Schema::drop('working_days');
    }
}
