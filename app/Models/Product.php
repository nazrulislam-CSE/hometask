<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }
    
    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class);
    }
   
}
