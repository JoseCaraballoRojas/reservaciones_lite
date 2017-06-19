<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';

    protected $fillable = [
        	'day','reason','details','agendas_id'
    ];

    public function agenda()
  	{
      return $this->belongsTo('Vanguard\Agenda', 'agendas_id');
  	}
}
