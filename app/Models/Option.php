<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','attribute_id','product_id'];


    public function attribute(){
        return $this->belongsTo(attribute::class , 'attribute_id');
    }
    
    public function product(){
        return $this->belongsTo(Product::class , 'product_id');
    }
}