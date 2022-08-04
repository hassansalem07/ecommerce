<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'brand_id',
        'category_id',
];

public function scopeActive($query){
    return $query->where('is_active',1);
  }

  public function stockStatus(){
     return $this->in_stock ? 'in stock' : 'out stock';
  }

public function brand(){
    return $this->belongsTo(Brand::class , 'brand_id');
}

public function category(){
    return $this->belongsTo(Category::class , 'category_id');
}

public function tags(){
    return $this->belongsToMany(Tag::class , 'product_tag');
}

public function isActive(){
    return  $this->is_active == 1 ? 'active' : 'not active';
  }

  public function images(){
    return $this->morphMany(Image::class , 'imageable');
}

public function options(){
    return $this->hasMany(Option::class , 'product_id');
}

public function reviews(){
    return $this->hasMany(Review::class , 'product_id');
}

public function wishlist_users(){
    return $this->belongsToMany(User::class , 'wishlists');
}

public function orders(){
    return $this->belongsToMany(Order::class , 'order_product')->withPivot('qty');
}

}