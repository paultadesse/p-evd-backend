<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class SuperAdmin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'super-admin';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
