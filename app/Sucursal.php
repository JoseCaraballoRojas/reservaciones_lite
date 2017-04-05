<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'sucursal', 'direccion', 'ciudad', 'estado', 'telefono', 'logo', 'contacto1_id',
        'contacto2_id', 'username', 'email', 'phone', 'empresa_id','nombre'
    ];

    public function user()
    {
      return $this->belongsTo('Vanguard\User', 'contacto1_id');
    }

    public function empresa()
    {
      return $this->belongsTo('Vanguard\Empresa');
    }

    public function areas()
    {
        return $tihis->hasMany('Vanguard\Area');
    }

}
