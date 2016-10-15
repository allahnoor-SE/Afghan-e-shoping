<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class WomenController extends Controller
{
    
    public function formal(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 1)->get();
    	return view ('women.formal', compact('products'));
    }
}
