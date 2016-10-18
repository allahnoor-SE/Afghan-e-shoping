<?php

namespace App\Http\Controllers\api;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class apiController extends Controller
{

    public function index(){
        $products = Product::all();
        return response()->json(compact('products'));
    }


    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function addToWishlist($id)
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $user->wishlists()->attach($id);

        return response()->json(['message' => 'Successfully Added'], 200);
    }

    public function wishlists()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $wishlists = $user->wishlists;

        return response()->json(compact('wishlists'));
    }

    public function removeFromWishlist($id){
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $user->wishlists()->detach($id);

        return response()->json(['message' => 'Successfully Removed'], 200);
    }

    public function addToCart($id)
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $user->carts()->attach($id);

        return response()->json(['message' => 'Successfully Added'], 200);
    }

    public function carts()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $carts = $user->carts;

        return response()->json(compact('carts'));
    }

    public function removeFromCart($id){
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $user->carts()->detach($id);

        return response()->json(['message' => 'Successfully Removed'], 200);
    }


}
