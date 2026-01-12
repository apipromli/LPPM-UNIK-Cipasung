<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restra extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_year',
        'end_year',
        'description',
        'document',
    ];
}
