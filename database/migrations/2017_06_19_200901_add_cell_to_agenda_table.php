<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCellToAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('agendas', function (Blueprint $table) {
          $table->string('agenda')->nullable()->after('responsable_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('agendas', function (Blueprint $table) {
            $table->dropColumn('agenda');
      });
    }
}
