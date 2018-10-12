<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id', 'name' ,'price', 'stock', 'description', 'photo']; 


    public function category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');	
    }
}
