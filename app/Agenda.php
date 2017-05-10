<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas';

    protected $fillable = [
        'agenda', 'direccion', 'responsable_id', 'username', 'email',
        'phone', 'area', 'area_id', 'sucursal', 'sucursal_id', 'motivo',
        'reason_id', 'reason', 'duration'
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

}
