<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class KidController extends Controller
{
  

public function boys(){

    	$products = Product::where('category_id', 3)
    	->where('type_id', 9)->get();
    	return view ('women.formal', compact('products'));
    }

public function girls(){

    	$products = Product::where('category_id', 3)
    	->where('type_id', 10)->get();
    	return view ('women.formal', compact('products'));
    }
}
