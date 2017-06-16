<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas';

    protected $fillable = [
        'agenda', 'direccion', 'responsable_id', 'username', 'email',
        'phone', 'area', 'area_id', 'sucursal', 'sucursal_id', 'motivo',
        'reason_id', 'reason', 'duration', 'start_time', 'final_hour',
        'blocking_schedules_per_day', 'selectable_agenda', 'reason_for_appointment',
        'time_format', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday',
        'saturday', 'sunday', 'initial_holiday_date', 'holiday_end_date',
        'appointment_approval', 'appointment_approval_user', 'estatus_agenda',
        'type_reservation', 'type_reservation_day_or_time', 'max_number_shifts_per_day',
        'visible_shifts', 'block_time', 'block_time_minutes_hours', 'max_per_block',
        'time_of_each_appointment', 'appointments_time_minutes_hours', 'max_daily_appointments',
        'max_number_daily_appointments', 'allow_modify_date_time', 'anticipation_time_modify',
        'cancel_appointment', 'anticipation_time_cancel', 'cancel_with_confirmation_email',
        'time_for_activation', 'limit_number_of_appointments', 'notifications_email',
        'time_to_send_emails', 'notifications_sms', 'time_to_send_sms', 'email_copy',
        'email_copy_receiver'

    ];

    public function user()
    {
      return $this->belongsTo('Vanguard\User', 'responsable_id');
    }

    public function area()
    {
        return $this->belongsTo('Vanguard\Area', 'area_id');
    }

    public function reason()
    {
        return $this->belongsTo('Vanguard\Reason', 'reason_id');
    }

    public function citas()
    {
        return $tihis->hasMany('Vanguard\Cita');
    }

    public function holiday()
    {
        return $tihis->hasMany('Vanguard\Holiday');
    }
}
