<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
	protected $table = 'products';
    protected $fillable=[ 'imagePath', 'title' , 'description', 'price' , 'category_id', 'type_id'];


    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function type(){
    	return $this->belongsTo('App\Type','type_id');
    }
    public function order(){
    	return $this->hasMany('App\Order');
    }


}
