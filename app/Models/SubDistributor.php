<?php

namespace App\Models;

use App\Models\Distributor;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class SubDistributor extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guard = 'sub-distributor';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function retailers()
    {
        return $this->hasMany(Retailer::class);
    }


}
