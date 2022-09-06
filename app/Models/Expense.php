<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'supplier_id',
        'total_amount',
        'paid_amount',
        'due_amount',
        'advanced_amount',
    ];
}
