<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('agendas', function ($table) {
          $table->dropForeign('agendas_area_id_foreign');
          $table->renameColumn('area_id', 'empresa_id');
        });

        Schema::table('agendas', function(Blueprint $table) {

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');
        });

        Schema::dropIfExists('areas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
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

      Schema::table('agendas', function ($table) {
        $table->dropForeign('agendas_empresa_id_foreign');
        $table->renameColumn('empresa_id', 'area_id');
      });

      Schema::table('agendas', function(Blueprint $table) {

          $table->foreign('area_id')
              ->references('id')
              ->on('areas')
              ->onDelete('cascade');
      });

    }
}
