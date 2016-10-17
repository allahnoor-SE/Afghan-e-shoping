<?php
Route::auth();


Route::group(['middleware' => 'auth'],function(){
 
//route for logout
Route::get('/logout',['as' => 'logout', 'uses' => 'UserController@logout']);

//restfull route for products
Route::resource('product','ProductController');
Route::get('product/create', 'ProductController@create');
Route::post('product/store', 'ProductController@store');

//route for checkout an product
Route::get('/checkout',['as' => 'checkout','uses' => 'ProductController@getcheckout']);
Route::post('/checkout',['as' => 'checkout','uses' => 'ProductController@postcheckout']);

 //route for card
Route::get('/add_to_card/{id}',['as' => 'product.addtocard','uses' => 'ProductController@getAddToCart']);
Route::get('/shopping-cart',['as' => 'product.shoppingCart','uses' => 'ProductController@getcart']);

//route for wishlist
Route::get('/add_to_wishlist/{id}',['as' => 'product.addtowishlist','uses' => 'ProductController@getAddToWishlist']);
Route::get('/wish_list',['as' => 'product.wishlist','uses' => 'ProductController@getwishlist']);

});


// routes to women controller
Route::get('women/formal', 'WomenController@formal');
Route::get('women/casual', 'WomenController@casual');
Route::get('women/evening_dress', 'WomenController@evening_dress');
Route::get('women/hejab', 'WomenController@hejab');
Route::get('women/shose_bag', 'WomenController@shose_bag');
Route::get('women/sport', 'WomenController@sport');
Route::get('women/weedding_accessory', 'WomenController@weedding_accessory');
Route::get('women/weedding_dress', 'WomenController@weedding_dress');
Route::get('women/women', 'WomenController@women');


//routes for women controller
Route::get('men/formal', 'MenController@formal');
Route::get('men/jeuns', 'MenController@jeuns');
Route::get('men/shirt', 'MenController@shirt');
Route::get('men/shose', 'MenController@shose');
Route::get('men/sport', 'MenController@sport');
Route::get('men/suit', 'MenController@suit');
Route::get('men/t_shirt', 'MenController@t_shirt');
Route::get('men/men', 'MenController@men');

//Home page route
Route::get('contact','HomeController@contact');

//Home page route	
Route::get('/',['as' => 'product.index' , 'uses' => 'ProductController@index']);

