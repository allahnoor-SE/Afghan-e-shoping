<?php
Route::auth();


Route::group(['middleware' => 'auth'],function(){
 
//route for logout
Route::get('/logout',['as' => 'logout', 'uses' => 'UserController@logout']);

//user profile
Route::get('user/profile','ProductController@profile');

//restfull route for products
Route::resource('product','ProductController');
Route::get('product/create', 'ProductController@create');
Route::post('product/store', 'ProductController@store');
Route::get('product/edit/{id}', 'ProductController@edit');
Route::post('product/update/{id}', 'ProductController@update');
Route::get('product/destroy/{id}', 'ProductController@delete');

//route for checkout an product
Route::get('/checkout',['as' => 'checkout','uses' => 'ProductController@getcheckout']);
Route::post('/checkout',['as' => 'checkout','uses' => 'ProductController@postcheckout']);

 //route for card
Route::get('/add_to_card/{id}',['as' => 'product.addtocard','uses' => 'ProductController@getAddToCart']);
Route::get('/shopping-cart',['as' => 'product.shoppingCart','uses' => 'ProductController@getcart']);
Route::get('/remove/{id}','ProductController@getremove');
Route::get('/RemoveItems/{id}','ProductController@getRemoveItems');

//route for wishlist
Route::get('/add_to_wishlist/{id}',['as' => 'product.addtowishlist','uses' => 'ProductController@getAddToWishlist']);
Route::get('/wish_list',['as' => 'product.wishlist','uses' => 'ProductController@getwishlist']);
Route::get('/removewish/{id}','ProductController@getRemoveWish');
});

Route::auth();

// routes for api only
Route::group(['namespace' => 'api', 'prefix' => 'api'], function()
{
	Route::group(['middleware' => ['jwt.auth']], function(){
		Route::post('addToWishlist/{id}', 'apiController@addToWishlist');
		Route::post('removeFromWishlist/{id}', 'apiController@removeFromWishlist');
		Route::get('wishlists', 'apiController@wishlists');

		Route::post('addToCart/{id}', 'apiController@addToCart');
		Route::post('removeFromCart/{id}', 'apiController@removeFromCart');
		Route::get('carts', 'apiController@carts');
	});

	Route::post('login', 'apiController@authenticate');
	Route::get('products', 'apiController@index');

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


//routes for men controller
Route::get('men/formal', 'MenController@formal');
Route::get('men/jeuns', 'MenController@jeuns');
Route::get('men/shirt', 'MenController@shirt');
Route::get('men/shoes', 'MenController@shoes');
Route::get('men/sport', 'MenController@sport');
Route::get('men/suit', 'MenController@suit');
Route::get('men/t_shirt', 'MenController@t_shirt');
Route::get('men/men', 'MenController@men');

//route for kid controller
Route::get('kid/boys', 'KidController@boys');
Route::get('kid/girls', 'KidController@girls');

//contact page route
Route::get('contact','HomeController@contact');
Route::post('contact','HomeController@postcontact');

//Home page route	
Route::get('/',['as' => 'product.index' , 'uses' => 'ProductController@index']);



