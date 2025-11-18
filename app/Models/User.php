<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'store_name',
        'email',
        'phone',
        'password',
        'latitude',
        'longitude',
    ];


    protected $hidden = [
        'password',
    ];

    public function stokLpg()
    {
        return $this->hasMany(StokLpg::class, 'user_id');
    }


}
