<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','is_active'];

    public function isActive(){
      return  $this->is_active == 1 ? 'active' : 'not active';
    }


    public function scopeActive($query){
      return $query->where('is_active',1);
    }


    public function products(){
      return $this->hasMany(Product::class,'brand_id');
    }
}