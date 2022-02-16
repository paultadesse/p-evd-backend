<?php

namespace App\Models;

use App\Models\Distributor;
use App\Models\SubDistributor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Retailer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'retailer';

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

    public function subDistributor()
    {
        return $this->belongsTo(SubDistributor::class);
    }
}
