<?php

namespace App\Models;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Distributor extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'distributor';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function sales() 
    {
        return $this->belongsTo(Sales::class);
    }
}
