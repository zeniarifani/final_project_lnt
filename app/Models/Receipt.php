<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'product_name',
        'quantity',
        'address',
        'postal_code',
        'total_price'
    ];
}
