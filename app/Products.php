<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Products extends Model
{
	use SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['category_id', 'name' ,'price', 'stock', 'description', 'photo']; 


    public function category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');	
    }
}
