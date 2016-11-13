<?php

namespace App\Http\Controllers\api;
use App\Feedback;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class apiController extends Controller
{

    public function index(){

        $products = Product::all();
        return response()->json(compact('products'));

    }

    public function register(Request $request){

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->save();

        return response()->json(['message' => 'Registered Successfully'], 200);
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
        return response()->json(['token' => $token, 'name' => Auth::user()->name, 'email' => Auth::user()->email]);
    }

    public function authProducts(){
        $products = DB::select("SELECT p.*, IF(p.id = wish.product_id,1,0) AS status FROM products as p LEFT JOIN `wishlists` as wish ON wish.product_id = p.id AND product_id AND wish.user_id = 1");

        return response()->json(compact('products'));
    }

    public function addToWishlist($id)
    {
        $user = Auth::user();
        $user_carts = $user->wishlists->lists('id')->toArray();
        if(in_array($id, $user_carts)){

            return response()->json(['message' => 'Already Added'], 200);
        }
        else{

            $user->wishlists()->attach([$id]);

            return response()->json(['message' => 'Successfully Added'], 200);
        }
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

        $user = Auth::user();
        $user_carts = $user->carts->lists('id')->toArray();
        if(in_array($id, $user_carts)){

            return response()->json(['message' => 'Already Added'], 200);
        }
        else{

            $user->carts()->attach([$id]);

            return response()->json(['message' => 'Successfully Added'], 200);
        }
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

    public function men(){
        $products = Product::where('category_id',1)->get();
        return response()->json(compact('products'));
    }

    public function women(){
        $products = Product::where('category_id',2)->get();
        return response()->json(compact('products'));
    }

    public function kid(){
        $products = Product::where('category_id',3)->get();
        return response()->json(compact('products'));
    }

    public function order(Request $request, $id){

        $number = $request->get('number');
        $amount = $request->get('amount');
        $address = $request->get('address');
        $color = $request->get('color');
        $size = $request->get('size');

        $user = Auth::user();

        $user_orders = $user->orders->lists('id')->toArray();
        if(in_array($id, $user_orders)){

            return response()->json(['message' => 'Already Ordered'], 200);
        }
        else{

            Auth::user()->orders()->attach($id, ['amount' => $amount, 'color' => $color, 'size' => $size,
                'contact' => $number, 'address' => $address]);

            return response()->json(['message' => 'Successfully Ordered'], 200);
        }
    }

    // user orders
    public function orders(){
        $orders = Auth::user()->orders;

        return response()->json(compact('orders'));
    }

    // search for product
    public function search()
    {
        $searchterm = Input::get('keyword');
        if ($searchterm){

            $products = DB::table('products');
            $results = $products->where('title', 'LIKE', '%'. $searchterm .'%')
                ->orWhere('description', 'LIKE', '%'. $searchterm .'%')
                ->orWhere('price', 'LIKE', '%'. $searchterm .'%')
                ->get();

            return response()->json(compact('results'));

        }
    }

    // edit account
    public function updateAccount(Request $request){
        $user = User::find(Auth::user()->id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->update();

        return response()->json(['message' => 'Successfully updated']);

    }

    // cancel order
    public function cancelOrder($id){

        Auth::user()->orders()->detach($id);
        return response()->json(['message'=> 'Order Successfully Canceled']);
    }

    // user feedback for app
    public function feedback (Request $request){

        $f = Feedback::where('user_id', Auth::user()->id);
        Auth::user()->feedbacks()->delete($f);

        $feedback = new Feedback();
        $feedback->title = $request->get('title');
        $feedback->description = $request->get('description');
        $feedback->rate = $request->get('rate');
        $feedback->username = Auth::user()->name;
        $feedback->users()->associate(Auth::user());
        $feedback->save();



        return response()->json(['message'=> 'You have successfully rated our app']);
    }

    // feedbacks
    public function feedbacks(){
        $feedbacks = Feedback::orderBy('id','DESC')->get();
        return response()->json(compact('feedbacks'));
    }
}
