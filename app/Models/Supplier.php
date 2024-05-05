<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier'
    ];

    public function item(){
        return $this->belongsToMany(Item::class,'item_suppliers');
    }
}
