@extends('layouts.app')

@section('content')
   
   @if(Session::has('success'))
   <div class="row">
     <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
       <div id="charge-message" class="alert alert-success">
         {{ Session::get('success')}}
       </div>
     </div>
   </div>
  @endif
 <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
         <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq style="max-height: 400px" src="{{asset('img/10.jpg')}}" alt="Men slide img" />
              </div>
              <div class="seq-title">
              
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq style="max-height: 400px" src="{{asset('img/12.jpg')}}" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq style="max-height: 400px"  src="{{asset('img/13.jpg')}}" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                            
                           
               
               
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq style="max-height: 400px"  src="{{asset('img/11.jpg')}}" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                
              </div>
            </li>
            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq style="max-height: 400px" src="{{asset('img/5.jpg')}}" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
              </div>
            </li>                   
          </ul>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="{{asset('img/1.jpg')}}" alt="img">                    
                    <div class="aa-prom-content">
                      <h4><a href="#">For Women</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('img/3.jpg')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Exclusive Item</span>
                        <h4><a href="#">For Men</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('img/2.jpg')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        <h4><a href="#">On Shoes</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('img/4.jpg')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>New Arrivals</span>
                        <h4><a href="#">For Kids</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('img/5.jpg')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>25% Off</span>
                        <h4><a href="#">For Bags</a></h4>                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="{{url('men/men')}}" >Men</a></li>
                    <li><a href="{{url('women/women')}}">Women</a></li>
                    <li><a href="#sports" >Sports</a></li>
                    <li><a href="#electronics">Electronics</a></li>
                  </ul>
                  <!-- Tab panes -->
                  @foreach($products->chunk(1) as $productchunk)
                  <div class=" col-md-3">
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <li style="width: 251px">
                        @foreach($productchunk as $product)
                          <figure>
                            <a class="aa-product-img" href="#"><img style="width: 251px" src="/../{{$product->imagePath}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" href="{{ route('product.addtocard', ['id' => $product->id])}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$product->title}}</a></h4>
                              <p>{{$product->description}}</p>
                              <span class="aa-product-price">{{$product->price}}</span>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a  href="{{ route('product.addtowishlist', ['id' => $product->id])}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="{{route('product.show',$product->id)}}" data-toggle2="tooltip" data-placement="top" title="Quick View"><span class="fa fa-search"></span></a>                          
                          </div>
                       @endforeach
                        </li>
                         </ul>
          </div> 
        </div>
       </div>
           @endforeach    
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
    </div>
  </section>

 @endsection 