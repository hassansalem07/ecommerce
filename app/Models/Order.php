<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_address',
        'customer_city',
        'customer_phone',
        'customer_message',
        'status',
        'total_price',
    ];

    public function products(){
        return $this->belongsToMany(Product::class , 'order_product')->withPivot('qty');
    }
}