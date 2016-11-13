@extends('layouts.app')

@section('content')

 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('img/contuct.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Contact</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>         
          <li class="active">Contact</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="{{url('contact')}}" method="POST">
                   {{ csrf_field()}}
                    <div class="row">
                     
                      <div class="col-md-12">
                        <div class="form-group">                        
                          <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">                        
                          <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button class="aa-secondary-btn" value="Send Message" type="submit">Send</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>afghan Shop</h4>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, eius.</p>
                     <p><span class="fa fa-home"></span>Kabul, AF</p>
                     <p><span class="fa fa-phone"></span>+ 021.???.????</p>
                     <p><span class="fa fa-envelope"></span>Email: Humira@gmail.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

@endsection



