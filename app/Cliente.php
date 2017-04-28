<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'username', 'first_name', 'last_name', 'phone', 'avatar',
        'address', 'country_id', 'birthday', 'last_login', 'confirmation_token', 'status',
        'group_id', 'remember_token','cell'
    ];
}
