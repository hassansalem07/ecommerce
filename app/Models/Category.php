<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','parent_id','is_active'];

    public function isActive(){
        return  $this->is_active == 1 ? 'active' : 'not active';
      }

    public function mainCategory(){
        return $this->belongsTo(Category::class , 'parent_id');
    }
    
    public function subCategories(){
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function scopeMain($query){
        return $query->whereNull('parent_id');  
    }

    public function scopeSub($query){
        return $query->whereNotNull('parent_id');  
    }

    public function scopeActive($query){
        return $query->where('is_active',1);
      }

      public function products(){
        return $this->hasMany(Product::class , 'category_id');
      }
}