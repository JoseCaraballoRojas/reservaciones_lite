<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nombre', 'direccion', 'ciudad', 'estado', 'telefono', 'logo', 'contacto1_id',
        'contacto2_id', 'username', 'email', 'phone'
    ];

    public function user()
    {
      return $this->belongsTo('Vanguard\User', 'contacto1_id');
    }

}
