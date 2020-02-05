<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class RegularUser extends Authenticatable
{
    use Notifiable;
    protected $table='regular_users';
    protected $guard='regular_user';
    protected $fillable=[
        'name','email','password',
    ];
    protected $hidden=[
        'password','remember_token',
    ];
}
