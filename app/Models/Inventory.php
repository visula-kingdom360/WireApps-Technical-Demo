<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    
    protected $table = 'inventory';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'status',
        'created_at',
        'updated_at',
    ];
}
