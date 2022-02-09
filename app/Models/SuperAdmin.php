<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class SuperAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'super-admin';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
