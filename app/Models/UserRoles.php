<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory;

    protected $table = 'user_roles';
    
    protected $fillable = [
        'code',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];
}
