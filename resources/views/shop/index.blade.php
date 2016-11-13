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
 <!--  -->
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
                    <li><a href="#sports">Sports</a></li>
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
                            <a class="aa-product-img" href="#"><img style="width: 251px" src="{{asset('../img/'.$product->imagePath)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" href="{{ route('product.addtocard', ['id' => $product->id])}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$product->title}}</a></h4>
                              <p>{{$product->description}}</p>
                              <span class="aa-product-price">${{$product->price}}</span>
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