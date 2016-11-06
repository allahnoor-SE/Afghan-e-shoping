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

public function casual(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 10)->get();
    	return view ('women.formal', compact('products'));
    }

public function evening_dress(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 11)->get();
    	return view ('women.formal', compact('products'));
    }

public function hejab(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 12)->get();
    	return view ('women.formal', compact('products'));
    }

public function shose_bag(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 13)->get();
    	return view ('women.formal', compact('products'));
    }

public function sport(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 2)->get();
    	return view ('women.formal', compact('products'));
    }

public function weedding_accessory(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 14)->get();
    	return view ('women.formal', compact('products'));
    }

    public function weedding_dress(){

    	$products = Product::where('category_id', 2)
    	->where('type_id', 15)->get();
    	return view ('women.formal', compact('products'));
    }

      public function women(){

    	$products = Product::where('category_id', 2)->get();
    	return view ('women.women', compact('products'));
    }
}
