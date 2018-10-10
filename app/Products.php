<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'category_id','price', 'stock', 'description', 'photo']; 


    public function category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');	
    }
}
