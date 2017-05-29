<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
  protected $table = 'appointments';

  protected $fillable = [
      'cita', 'direccion', 'responsable_id', 'username', 'email',
      'phone', 'area', 'area_id', 'sucursal', 'sucursal_id', 'motivo',
      'appointment_date', 'appointment_time', 'agenda_id', 'cliente_id',
      'appointment_status', 'reason_id'
  ];

  public function agenda()
  {
      return $this->belongsTo('Vanguard\Agenda', 'agenda_id');
  }

  public function reason()
  {
      return $this->belongsTo('Vanguard\Reason', 'reason_id');
  }
  
}
