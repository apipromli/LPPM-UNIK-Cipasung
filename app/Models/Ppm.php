<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppm extends Model
{
    use HasFactory;

    protected $table = 'ppm_data';

    protected $fillable = [
        'nidn',
        'executor',
        'title',
        'year',
        'scheme',
        'location',
        'description',
        'document',
        'status',
    ];
}
