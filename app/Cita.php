<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
  protected $table = 'citas';

  protected $fillable = [
      'cita', 'direccion', 'responsable_id', 'username', 'email',
      'phone', 'area', 'area_id', 'sucursal', 'sucursal_id', 'motivo'
  ];
}
