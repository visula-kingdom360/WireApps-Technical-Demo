<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_code',
        'qanlitity',
        'price',
        'manufacture_date',
        'expire_date',
        'status',
        'created_at',
        'updated_at',
    ];
}
