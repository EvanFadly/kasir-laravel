<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogStok extends Model
{
    protected $villable = [
        'produk_id',
        'jumlah',
        'users_id',
    ];
}