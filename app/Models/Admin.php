<?php

namespace App\Models;

use App\Models\SalesManager;
use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [ 
        'password', 'remember_token'
    ];

    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class);
    }

    public function salesManagers()
    {
        return $this->hasMany(SalesManager::class);
    }
}
