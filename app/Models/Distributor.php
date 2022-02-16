<?php

namespace App\Models;

use App\Models\Retailer;
use App\Models\Sales;
use App\Models\SubDistributor;
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

    public function subDistributors()
    {
        return $this->hasMany(SubDistributor::class);
    }

    public function retailers()
    {
        return $this->hasMany(Retailer::class);
    }
}
