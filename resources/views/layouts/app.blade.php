<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
  <body> 
   <!-- wpf loader Two -->
   <!--  <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Afghan Shop</span>
      </div>
    </div>  -->      
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- Start header section -->
    <header id="aa-header">
 <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
             
              
             @if (Auth::guest())
                 <li><a href="{{ url('/login')}}">Login</a></li>
                  <li><a href="{{ url('/register')}}">Register</a></li>
                  <!-- <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li> -->
            @else
               @if(Auth::user()->role == 1)
                  <li class="hidden-xs"><a href="{{url('product/create')}}">Dashboord</a></li>
                      <li class="hidden-xs"><a href="{{url('/logout')}}">Logout</a></li>
                       <li class="hidden-xs"><a href="{{url('/admin')}}">Profile</a></li>
                    @else
                       <li class="hidden-xs"><a href="{{url('user/profile')}}">Profile</a></li>
                      <li class="hidden-xs"><a href="{{url('/logout')}}">Logout</a></li>
                  <li class="hidden-xs"><a href="{{url('/wish_list')}}">Wishlist<span class="badge">{{Session::has('carts') ? Session::get('carts')->totalQty : ''}}</span></a></li>
                 <!--  <li class="hidden-xs"><a href="{{url('/shopping-cart')}}">My Cart</a></li> -->
                 @endif
            @endif
               </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{url('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>afghan<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{url('/shopping-cart')}}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                </a>
       
              </div>
           
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="#">Men <span class="caret"></span></a>
                <ul class="dropdown-menu"> 
                  <li><a href="{{url('men/sport')}}">Sport</a></li>
                  <li><a href="{{url('men/shoes')}}">Shoes</a></li>       
                  <li><a href="{{url('men/jeuns')}}">Jeans</a></li>
                  <li><a href="{{url('men/shirt')}}">Shirt</a></li>
                  <li><a href="{{url('men/t_shirt')}}">T_Shirt</a></li>
                  <li><a href="{{url('men/formal')}}">Formal</a></li>
                  <li><a href="{{url('men/suit')}}">Suit</a></li>
                 
                </ul>
              </li>
              <li><a href="#">Women <span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="{{url('women/weedding_dress')}}">Weedding Dress</a></li>
                  <li><a href="{{url('women/weedding_accessory')}}">Wedding Accessories</a></li>
                  <li><a href="{{url('women/evening_dress')}}">evening Dress</a></li>              
                  <li><a href="{{url('women/casual')}}">Casual</a></li>
                  <li><a href="{{url('women/sport')}}">Sport</a></li>
                  <li><a href="{{url('women/formal')}}">Formal Dress</a></li>                
                  <li><a href="{{url('women/shose_bag')}}">Shose & Bag</a></li>
                  <li><a href="{{url('women/hejab')}}">Hejab Dress</a></li>
             
                </ul>
              </li>
              <li><a href="#">Kids <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="{{url('kid/boys')}}">boys</a></li>
                  <li><a href="{{url('kid/girls')}}">girls</a></li>
                 
                  
                </ul>
              </li>
            <li><a href="{{url('contact')}}">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
   <div class="container">
   @yield('content')
   </div>
   
   @include('partials._footer')
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" method="POST" action="{{ url('/login') }}">
              {{ csrf_field() }}
            <label for=""> Email address<span>*</span></label>
            <input type="text" name="email" value="{{ old('email')}}" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" name="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="{{url('/signup')}}">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    
    @include('partials._javascript')
</body>
</html>

