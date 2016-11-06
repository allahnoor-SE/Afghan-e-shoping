@extends('layouts.app')

@section('content')
   @if(Session::has('cart'))  

 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Action</th>
                       
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td><a class="remove" href="{{url('remove',['id' => $product['item']['id']])}}" data-toggle="tooltip" data-placement="top" title="Remove One Item"><fa class="fa fa-close"></fa></a>
                         <a class="remove" href="{{url('RemoveItems',['id' => $product['item']['id']])}}" data-toggle="tooltip" data-placement="top" title="Remove All Items"><fa class="fa fa-close"></fa></a>
                        </td>
                        
                        <td><a class="aa-cart-title" href="#"> {{ $product['item'] ['title']}}</a></td>
                        <td>${{ $product['price']}}</td>
                        <td> {{ $product['qty'] }}</td>
                        
                      </tr>
                     @endforeach
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>

                   <tr>
                     <th>Total</th>
                     <td>${{$totalPrice}}</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{ url('checkout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 @endif
@endsection