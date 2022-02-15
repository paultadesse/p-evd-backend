<?php

namespace App\Models;

use App\Models\SalesManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Sales extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'sales';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function salesManager()
    {
        return $this->belongsTo(SalesManager::class);
    }
}
