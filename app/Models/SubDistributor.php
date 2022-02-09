<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class SubDistributor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'sub-distributor';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
