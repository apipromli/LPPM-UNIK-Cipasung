<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetRealization extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'budget_amount',
        'realization_amount',
        'percentage',
        'description',
        'document',
    ];

    protected $casts = [
        'budget_amount' => 'decimal:2',
        'realization_amount' => 'decimal:2',
        'percentage' => 'decimal:2',
    ];
}
