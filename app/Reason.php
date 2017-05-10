<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'reasons';

    protected $fillable = ['reason', 'duration', 'created_at'];

    public function agendas()
    {
        return $tihis->hasMany('Vanguard\Agenda');
    }

}
