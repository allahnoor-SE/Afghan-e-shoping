@extends('layouts.app')

@section('content')


  

<form action="{{ url('store')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}
  <input type="file"  name="icon"><br>
  <input type="text" name="title">
   <input type="text" name="description">
    <input type="text" name="price">
  <input type="submit" name="submit" value="submit" >
</form>



  <div class="col-md-10">
                <div class="checkout-right">
                  <hr>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Price</th>
                           <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $product)
                  
                        <tr>
                          <td>{{$product->id}} </td>
                          <td><img  style="width: 100px" src="{{ $product->imagePath}}"></td>
                        
                          <td>{{$product->title}}</td>
                          <td>{{$product->description}}</td>
                          <td>${{$product->price}}</td>
                          <td><a  href="{{url('product/edit',$product->id)}}">Edit</a>
                          <a href="{{url('product.destroy',$product->id)}}">Delet</a>
                    
                        </tr>
                      @endforeach
                     
                      </tbody>
                      
                    </table>
                  </div>
                
                  <div class="aa-payment-method">                    
                   
                      
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                  </div>
                </div>
              </div>



@endsection