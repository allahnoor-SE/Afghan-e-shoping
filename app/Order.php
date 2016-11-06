<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

protected $table = 'orders';
    protected $fillable=[ 'cart', 'name', 'payment_number' , 'city', 'address'];

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
