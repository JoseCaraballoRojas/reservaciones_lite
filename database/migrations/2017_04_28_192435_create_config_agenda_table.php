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
            $table->string('visible_shifts')->nullable();
            $table->string('time_of_each_appointment')->nullable();
            $table->string('appointment_time_minutes_hours')->nullable();
            $table->string('max_daily_appointments')->nullable();
            $table->string('max_daily_appointments')->nullable();
            $table->string('max_number_daily_appointments')->nullable();
            $table->string('appointments_time_minutes_hours')->nullable();
            $table->string('time_format')->nullable();
            $table->string('start_time')->nullable();
            $table->string('final_hour')->nullable();
            $table->string('blocking_schedules_per_day')->nullable();

            $table->string('notifications_email')->nullable();
            $table->string('time_to_send_emails')->nullable();
            $table->string('notifications_sms')->nullable();
            $table->string('time_to_send_sms')->nullable();
            $table->string('email_copy')->nullable();
            $table->string('email_copy_receiver')->nullable();
            $table->string('initial_holiday_date')->nullable();
            $table->string('holiday_end_date')->nullable();
            $table->string('selectable_agenda')->nullable();
            //FOREIGN KEYS
            $table->integer('agenda_id')->unsigned();
            $table->integer('reason_appointment_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('config_agendas', function(Blueprint $table) {
            $table->foreign('agenda_id')
                ->references('id')
                ->on('agendas')
                ->onDelete('cascade');

            $table->foreign('reason_appointment_id')
                ->references('id')
                ->on('reasons')
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
