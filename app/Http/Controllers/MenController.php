<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class MenController extends Controller
{

public function sport(){

    	$products = Product::where('category_id', 1)
    	->where('type_id', 2)->get();
    	return view ('men.sport', compact('products'));
    }

public function formal(){

    	$products = Product::where('category_id', 1)
    	->where('type_id', 1)->get();
    	return view ('men.formal', compact('products'));
    }

public function jeuns(){

    	$products = Product::where('category_id', 1)
    	->where('type_id', 5)->get();
    	return view ('men.jeuns', compact('products'));

    }
public function shirt(){

    	$products = Product::where('category_id', 1)
    	->where('type_id', 3)->get();
    	return view ('men.shirt', compact('products'));

    }
public function t_shirt(){

    	$products = Product::where('category_id', 1)
    	->where('type_id', 4)->get();
    	return view ('men.t_shirt', compact('products'));

    }
public function suit(){
        $products = Product::where('category_id', 1)
    	->where('type_id', 6)->get();
    	return view ('men.suit', compact('products'));

    }
public function shose(){
        $products = Product::where('category_id', 1)
    	->where('type_id', 7)->get();
    	return view ('men.shose', compact('products'));
    }

public function men(){
        $products = Product::where('category_id', 1)
        ->get();
    	return view ('men.men', compact('products'));
    }
}
