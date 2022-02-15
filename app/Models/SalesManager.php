<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class SalesManager extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'sales-manager';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [ 
        'password', 'remember_token'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
