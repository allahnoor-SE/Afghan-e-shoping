<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wishlists(){

        return $this->belongsToMany('App\Product', 'wishlists', 'user_id', 'product_id');
    }

    public function carts(){

        return $this->belongsToMany('App\Product', 'carts', 'user_id', 'product_id');
    }

    public function orders(){

        return $this->belongsToMany('App\Product', 'orderss', 'user_id', 'product_id');
    }

    public function feedbacks(){
        return $this->hasOne('App\Feedback', 'user_id');
    }
}
