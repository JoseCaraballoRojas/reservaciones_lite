<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('allow_modify_date_time', 10)->nullable();
            $table->string('anticipation_time_modify')->nullable();
            $table->string('cancel_appointment', 10)->nullable();
            $table->string('anticipation_time_cance')->nullable();
            $table->string('cancel_with_confirmation_email', 10)->nullable();
            $table->string('time_for_activation')->nullable();
            $table->string('limit_number_of_appointments')->nullable();
            $table->string('Appointment_approval', 10)->nullable();
            $table->string('Appointment_approval_user')->nullable();
            $table->string('estatus_agenda')->nullable();
            $table->string('type_reservation')->nullable();
            $table->string('type_reservation_day_or_time')->nullable();
            $table->string('max_number_shifts_per_day')->nullable();
            $table->string('block_time')->nullable();
            $table->string('block_time_minutes_hours')->nullable();
            $table->string('max_per_block')->nullable();
            $table->string('formato_hora')->nullable();
            $table->string('hora_inicial')->nullable();
            $table->string('hora_final')->nullable();
            $table->string('turnos_visibles')->nullable();
            $table->string('time_of_each_appointment')->nullable();
            $table->string('appointment_time_minutes_hours')->nullable();
            $table->string('dias_habiles_semana')->nullable();
            $table->string('bloqueo_horarios_dias')->nullable();
            $table->string('max_daily_appointments')->nullable();
            $table->string('conf_numero_max_citas')->nullable();
            $table->string('catalogo_razones_cita')->nullable();
            $table->string('recordatorio_email')->nullable();
            $table->string('tiempo_evio_recordatorio_dias')->nullable();
            $table->string('sms_recordatorio')->nullable();
            $table->string('tiempo_envio_sms_horas')->nullable();
            $table->string('copia_email')->nullable();
            $table->string('vacaciones_fecha_inicial')->nullable();
            $table->string('vacaciones_fecha_final')->nullable();
            $table->string('selecionable_frontend')->nullable();

            $table->integer('agenda_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('config_agendas', function(Blueprint $table) {
            $table->foreign('agenda_id')
                ->references('id')
                ->on('agendas')
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
        Schema::drop('config_agendas');
    }
}
