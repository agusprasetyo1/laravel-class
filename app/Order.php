<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
	
    protected $table = "orders";
    protected $fillable = ['user_id', 'product_id'];

	public function order(){
		return $this->belongsToMany('App\Order');
	}

	public function dataUser(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function dataProducts(){
		return $this->belongsTo('App\Products', 'product_id', 'id');
	}
}



