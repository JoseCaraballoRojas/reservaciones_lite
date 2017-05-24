<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  protected $table = 'appointments';

  protected $fillable = [
      'ageda_id', 'cliente_id', 'date', 'appointment'
  ];
  
}
