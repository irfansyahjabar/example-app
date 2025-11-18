<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokLpg extends Model
{
    protected $table = 'stok_lpg';

    protected $fillable = [
        'jenis',
        'stok',
        'harga',
        'status',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

