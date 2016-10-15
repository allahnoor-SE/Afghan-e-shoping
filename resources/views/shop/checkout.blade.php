@extends('layouts.app')

@section('content')


 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''}}">
          {{Session::get('error')}}
        </div>
          <form action="{{ url('/checkout')}}" method="POST" id="checkout-form">
          {{ csrf_field()}}
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                   <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="name" id="name" placeholder="First Name*" required>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Last Name*" id="last-name" required>
                              </div>
                            </div>
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" id="email" 
                                required>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*"  id="cart-phone" required>
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" id="cart-address" rows="3">Address*</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select>
                                  <option value="0">Select Your City</option>
                                  <option value="1">Kabul</option>
                                  <option value="2">Herat</option>
                                  <option value="3">Farah</option>
                                  <option value="4">Kandhar</option>
                                  <option value="5">Mazar</option>
                                  <option value="6">Jalalabad</option>
                                  <option value="7">Parwan</option>
                                  <option value="8">Qzny</option>
                                  <option value="9">Helmand</option>
                                  <option value="10">Badakhshan</option>
                                  <option value="11">Paktia</option>
                                  <option value="12">Wardak</option>
                                  <option value="13">Khost</option>
                                  <option value="14">Kapesa</option>
                                  <option value="15">Fariab</option>
                                  <option value="16">Qundoz</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" id="cart-expiry-year" placeholder="Expiration Year" required>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" id="cart-number" placeholder="Credit Cart Number*">
                              </div>
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" id="card-expiry-month" placeholder="Expiration Month*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" id="card-cvc" placeholder="CVC*">
                              </div>
                            </div>
                          </div> 
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">Special Notes</textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($products as $product)
                        <tr>
                          <td>{{ $product['item'] ['title']}}  <strong></strong></td>
                          <td>${{ $product['price']}}</td>
                        </tr>
                        @endforeach
                     
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td>${{$totalPrice}}</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label>
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" checked> Via MPYSA </label>
                      
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@endsection