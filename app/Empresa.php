<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nombre', 'direccion', 'estado', 'telefono', 'logo', 'contacto1_id', 'contacto2_id'
    ];

    public function user()
    {
      return $this->belongsTo('Vanguard\User', 'contacto1_id');
    }

}
