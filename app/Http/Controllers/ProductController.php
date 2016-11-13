<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\WishList;
use App\Type;
use App\Http\Requests;
use Session;
use App\Order;
use Image;
use Illuminate\Support\Facades\Input;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // orderBy('id','desc')->paginate(6)
public function index()
    {
       $products = Product::all();
       return view('shop.index')->withProducts($products);
    }

public function getAddToCart(Request $request, $id){

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

public function getremove($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        Session::put('cart',$cart);
        return redirect()->back();
}

public function getRemoveItems($id){
     $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
         
        $cart->RemoveItems($id);

         Session::put('cart',$cart);
        return redirect()->back();
}


public function getcart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

   
public function getcheckout(){

          if (!Session::has('cart')) {
            return view('shop.shopping-cart');
         }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $total = $cart->totalPrice;
    return view('shop.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

        }


public function postcheckout(Request $request){
               if (!Session::has('cart')) {
            return view('shop.shoppingCart');
         }
         $oldCart = Session::get('cart');
         $cart = new Cart($oldCart);
         // Stripe::setApiKey('sk_test_c2KkjUaxDA1VD4Fnqcbz3DL1');
         try {
            // $charge=Charge::create(array(
            //    "amount" => $cart->totalPrice * 100,
            //    "currency" => "usd",
            //    "source" =>  $request->input('stripeToken'),
            //    "description" => "test Charge"

            //     ));
            $order = new Order;
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->payment_number = $request->input('payment_number');
            $order->city = $request->input('city');
            $order->address = $request->input('address');

            Auth::user()->order()->save($order);

         } catch (Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
             
         }
           
         Session::forget('cart');
         return redirect()->route('product.index')->with('success','Successfully purchased products');
        }

      
public function getAddToWishlist(Request $request, $id){
       $product = Product::find($id);
        $oldCart = Session::has('carts') ? Session::get('carts') : null;
        $carts = new Cart($oldCart);
        $carts->add($product, $product->id);

        $request->session()->put('carts',$carts);
        return redirect()->back();

}

public function getRemoveWish($id){
        $oldCart = Session::has('carts') ? Session::get('carts') : null;
        $carts = new Cart($oldCart);
        $carts->wishRemove($id);

        Session::put('carts',$carts);
        return redirect()->back();
}

public function getwishlist(){
      if (!Session::has('carts')) {
            return view('shop.wish_list');
        }
        $oldCart = Session::get('carts');
        $carts = new Cart($oldCart);
        return view('shop.wish_list', ['products' => $carts->items, 'totalPrice' => $carts->totalPrice]);

}


 public function profile()
    {
       $order = Auth::user()->order;
       $order->transform(function($orders,$key){
       $orders->cart = unserialize($orders->cart);
         return $orders;
       });
        return view('user.profile',['order' => $order]);
    }

   public function create(){

           if (Auth::user()->role != 1) {
        return response()->view('errors.503');
    }
        $products = new Product;
        $data = $products->get();
        return view('Product.create')->with('data',$data);
      
    }

    public function edit($id)
    {
    $product = Product::find($id);
    return view('product.edit')->with('product',$product);
    }

    public function update(Request $request, $id){
        $title = $request->get('title');
        $desc = $request->get('description');
        $price = $request->get('price');

        $product = Product::find($id);


        $image = $request->file('imagePath');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $request->file('imagePath')->move(
            base_path() . '/public/img/', $filename
        );

        $product->title = $title;
        $product->description = $desc;
        $product->price = $price;
        $product->imagePath = $filename;
        $product->update();

        return redirect('product/create');

    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect('product/create');
    }



     public function store(Request $request)
    {

             if (Auth::user()->role != 1) {
        return response()->view('errors.503');
    }
       
        $product = new Product; 
        $product->title = $request->title;
         $product->description = $request->description;
         $product->price = $request->price; 
         $product->category_id = $request->category_id;
         $product->type_id = $request->type_id;   
        
        $image = $request->file('icon');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $request->file('icon')->move(
            base_path() . '/public/img/', $filename
        );

        $product->imagePath = $filename;
        $product->save();
             return redirect()->back();
    }
 

    public function show($id){
        $product = Product::find($id);
        return view('product.show')->withProduct($product);
 }

  public function IndixOrder(){
    $order = Order::all();
   
    $order->transform(function($orders,$key){
    $orders->cart = unserialize($orders->cart);
         return $orders;
       });
    return view('user.admin')->with('order',$order);

  }
  public function deleteOrder($id){
    $order = Order::find($id);
    $order->delete();
    return redirect()->back();

  }

 

}
