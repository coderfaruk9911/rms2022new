<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expensedetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'unit_price',
        'unit',
        'price',
    ];
}
