<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockproductlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
    ];
}
