<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'email',
        'phone',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
