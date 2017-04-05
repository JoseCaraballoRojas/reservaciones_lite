<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table = 'areas';

  protected $fillable = [
      'area', 'direccion', 'responsable_id', 'username', 'email',
      'phone', 'sucursal', 'sucursal_id'
  ];

  public function user()
  {
    return $this->belongsTo('Vanguard\User', 'responsable_id');
  }

  public function sucursal()
  {
      return $this->belongsTo('Vanguard\Sucursal', 'sucursal_id');
  }
}
