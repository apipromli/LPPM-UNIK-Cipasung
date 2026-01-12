<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';

    protected $fillable = [
        'nidn',
        'researcher',
        'title',
        'year',
        'scheme',
        'type',
        'funding_source',
        'amount',
        'abstract',
        'document',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];
}
