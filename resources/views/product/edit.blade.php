@extends('layouts.app')

@section('content')

         <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="{{url('product/update/'.$product->id)}}" enctype="multipart/form-data" method="post">

                       <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="title" class="form-control" name="title" value="{{$product->title}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="description" class="form-control" value="{{$product->description}}" name="description">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="number" placeholder="price" class="form-control" value="{{$product->price}}" name="price">
                        </div>
                      </div>

                    </div>                  
                     
                    <div class="form-group">
                        <input type="file" name="imagePath" value="{{$product->imagePath}}">

                    </div>
                    <button class="aa-secondary-btn" type="submit">Update</button>
                  </form>
                 </div>
               </div>
            <!--    <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>DailyShop</h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum modi dolor facilis! Nihil error, eius.</p>
                     <p><span class="fa fa-home"></span>Huntsville, AL 35813, USA</p>
                     <p><span class="fa fa-phone"></span>+ 021.343.7575</p>
                     <p><span class="fa fa-envelope"></span>Email: support@dailyshop.com</p>
                   </address>
                 </div>
               </div> -->
             </div>
           </div>
@endsection