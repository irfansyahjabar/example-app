<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokLpg extends Model
{
    protected $table = 'stok_lpg';

    protected $fillable = [
        'user_id',
        'jenis',
        'stok',
        'harga',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

