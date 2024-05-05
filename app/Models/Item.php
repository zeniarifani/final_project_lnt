<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'stock',
        'product_photo',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function supplier(){
        return $this->belongsToMany(Supplier::class,'item_suppliers');
    }
    
    
}
