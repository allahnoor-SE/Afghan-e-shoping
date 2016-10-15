<?php


Route::get('/',['as' => 'product.index' , 'uses' => 'ProductController@index']);

Route::get('/add_to_card/{id}',['as' => 'product.addtocard','uses' => 'ProductController@getAddToCart']);
Route::get('/shopping-cart',['as' => 'product.shoppingCart','uses' => 'ProductController@getcart']);


Route::get('/add_to_wishlist/{id}',['as' => 'product.addtowishlist','uses' => 'ProductController@getAddToWishlist']);
Route::get('/wish_list',['as' => 'product.wishlist','uses' => 'ProductController@getwishlist']);

Route::auth();
Route::resource('type','TypeController');

Route::get('men','ProductController@men');

Route::get('/checkout',
	['as' => 'checkout',
	'uses' => 'ProductController@getcheckout'
	]);
 Route::post('/checkout',
	['as' => 'checkout',
	'uses' => 'ProductController@postcheckout'
	]);

Route::get('create', 'ProductController@create');
Route::post('store', 'ProductController@store');

Route::resource('product','ProductController');



Route::group(['middleware' => 'guest'] , function(){
Route::get('/signup',[
	'as' => 'signup'
	,'uses' => 'UserController@signup'
	]);

Route::post('/postsignup',[
	'as' => 'signup',
	'uses' => 'UserController@postsignup'
	]);

Route::post('/handlelogin',[
	'as' => 'handlelogin',
	'uses' => 'UserController@handlelogin'
	]);	
});


Route::group(['middleware' => 'auth'],function(){

Route::get('/profile',[
	'as' => 'profile',
	'uses' => 'UserController@profile'
	]);

Route::get('/logout',[
	'as' => 'logout',
    'uses' => 'UserController@logout'
    ]);

});




Route::get('/home', 'HomeController@index');

Route::get('/mycards' , 'HomeController@mycards');

Route::get('/wishlist' , 'HomeController@wishlist');

Route::get('men/sport','TypeController@mensport');

// routes to women controller
Route::get('women/formal', 'WomenController@formal');