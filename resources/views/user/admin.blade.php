@extends('layouts.app')

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<center><h2> Admin Profile</h2></center> 
             <!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-danger">Action</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#" data-toggle="modal" data-target="#updateProfile">Edit Profile</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
  		 <hr>

  		 <h2>Users Orders</h2>
  		
       @foreach($order as $orders)
       

       <div class="panel panel-default">
           <div class="panel-body">
              <ul class="list-group">
               
              <label>Name:</label>
       <h6>{{$orders->name}}</h6>
       <label>City</label>
      <h6>{{$orders->city}}</h6>
      <label>Address</label>
      <h6>{{$orders->address}}</h6>
      <label>Payment_namber</label>
      <h6>{{$orders->payment_number}}</h6>
              <label>Resive at</label>
      <h6>{{$orders->created_at}}</h6>
      
              @foreach($orders->cart->items as $item)
             <li class="list-group-item"><span class="badge">${{ $item['price']}}</span>
            {{ $item['item']['title']}} | {{ $item['qty']}} Units
             </li>
             @endforeach
                </ul>
            </div>
            <div class="panel-footer">
                <strong>Total Price: ${{ $orders->cart->totalPrice}}</strong>
            </div>
           </div>
           @endforeach
  	</div>
  </div>
  <div class="modal fade" id="updateProfile" role="dialog" aria-labelledby="updateProfile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Profile</h4>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{url('user/adminprofile/'.Auth::user()->id)}}" method="put" enctype="multipart/form-data">
                    <div class="modal-body">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{Auth::user()->name}}" required>
                        </div>

                        <div class="form-group">
                            <input type="email" placeholder="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="password" name="password" class="form-control" value="" required>
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger confirm" id="confirm">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection