@extends('layouts.app')

@section('content')
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="{{ url('/handlelogin')}}" method="POST" class="aa-login-form">
                   {{ csrf_field() }}
                  <label for="">Email address<span>*</span></label>
                   <input type="text"  value="{{ old('email') }}" name="email" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                  <form method="POST" action="{{ url('/postsignup') }}" class="aa-login-form">
                  {{ csrf_field() }}
                   <label for="email">Name<span>*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Username or email">
                    <label for="email">Email address<span>*</span></label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Username or email">
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection