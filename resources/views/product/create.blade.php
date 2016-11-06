@extends('layouts.app')

@section('content')


  

<form action="{{ url('product/store')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}
<label>Image</label><br>
<div class="form-controll"></div>
  <input type="file"  name="icon"><br>
  <label>Title</label><br>
  <input type="text" name="title"><br>
  <label>Description</label><br>
   <input type="text" name="description"><br>
   <label>Price</label><br>
    <input type="text" name="price"><br>
  
  <select name="category_id">
            <option>Select Category</option>
          
            <option value="{{1}}" id="classes" >Men</option>
            <option value="{{2}}" id="classes" >Women</option>
            <option value="{{3}}" id="classes" >Kids</option>
           <!--  <option value="{{4}}" id="classes" >Drass</option> -->

  </select>

    <select name="type_id">
            <option>Select Type</option>
          
            <option value="{{1}}" id="classes" >Formal</option>
            <option value="{{2}}" id="classes" >Sport</option>
            <option value="{{3}}" id="classes" >Shirt</option>
            <option value="{{4}}" id="classes" >T_Shirt</option>
            <option value="{{5}}" id="classes" >Jeans</option>
            <option value="{{6}}" id="classes" >Suit</option>
          <!--   <option value="{{7}}" id="classes" >Shoes</option>
            <option value="{{8}}" id="classes" >Boy</option>
            <option value="{{9}}" id="classes" >Girl</option>
            <option value="{{10}}" id="classes" >Casual</option>
            <option value="{{11}}" id="classes" >Evening_dress</option>
            <option value="{{12}}" id="classes" >Hejab</option>
            <option value="{{13}}" id="classes" >Shoes & Bags</option>
            <option value="{{14}}" id="classes" >weedding_accessory</option>
            <option value="{{15}}" id="classes" >weedding_dress</option> -->


  </select><br>
  <input class="btn btn-success" type="submit" name="submit" value="submit" >
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
                          <td><img style="width: 251px" src="{{asset('img/'.$product->imagePath)}}" alt="polo shirt img"></td>
                        
                          <td>{{$product->title}}</td>
                          <td>{{$product->description}}</td>
                          <td>${{$product->price}}</td>
                          <td><a  href="{{url('product/edit',$product->id)}}">Edit</a>
                          <a href="{{url('product/destroy',$product->id)}}">Delete</a>
                    
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