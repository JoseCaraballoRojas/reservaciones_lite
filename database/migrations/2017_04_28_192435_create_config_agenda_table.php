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
            $table->string('permitir_modificacion_fecha', 10)->nullable();
            $table->string('tiempo_anticipacion_pmf')->nullable();
            $table->string('cancelar_cita', 10)->nullable();
            $table->string('tiempo_anticipacion_cc')->nullable();
            $table->string('cancelar_con_correo_confirmacion', 10)->nullable();
            $table->string('tiempo_activacion_del_token')->nullable();
            $table->string('limitar_numero_citas_cliente')->nullable();
            $table->string('aprobacion_cita', 10)->nullable();
            $table->string('responsable_aprobacion')->nullable();
            $table->string('estatus_agenda')->nullable();
            $table->string('tipo_reservacion')->nullable();
            $table->string('turno_dia_horario')->nullable();
            $table->string('maximo_turnos_dia')->nullable();
            $table->string('tiempo_bloque_turno')->nullable();
            $table->string('numero_maximo_bloque')->nullable();
            $table->string('formato_hora')->nullable();
            $table->string('hora_inicial')->nullable();
            $table->string('hora_final')->nullable();
            $table->string('turnos_visibles')->nullable();
            $table->string('tiempo_cita')->nullable();
            $table->string('tiempo_cita_minutos_horas')->nullable();
            $table->string('dias_habiles_semana')->nullable();
            $table->string('bloqueo_horarios_dias')->nullable();
            $table->string('numero_max_citas_dia')->nullable();
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
