
@extends('layouts.app')

@section('content')
   <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area aa-blog-archive-2">
            <div class="row">
              <div class="col-md-12">
                <div class="aa-blog-content">
                  <div class="row">
                  @foreach($products as $product)
                    <div class="col-md-4 col-sm-4">
                      <article class="aa-latest-blog-single">
                        <figure class="aa-blog-img">                    
                          <a href="#"><img alt="img"  src="{{asset('../img/'.$product->imagePath)}}"></a>  
                            <figcaption class="aa-blog-img-caption">
                             <a class="aa-add-card-btn" href="{{ route('product.addtocard', ['id' => $product->id])}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-shopping-cart"></span></a>
                            <!-- <span href="#"><i class="fa fa-eye"></i>5K</span> -->
                          
                            <a  href="{{ route('product.addtowishlist', ['id' => $product->id])}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>

                           <!--  <a href="#"><i class="fa fa-comment-o"></i>20</a> -->
                            <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                          </figcaption>                          
                        </figure>
                        <div class="aa-blog-info">
                          <h3 class="aa-blog-title"><a href="#">{{$product->title}}</a></h3>
                          <p>{{$product->description}}</p> 
                        </div>
                      </article>
                    </div>
                 
                     @endforeach                
                  </div>
                </div>
                <!-- Blog Pagination -->
                <div class="aa-blog-archive-pagination">
                  <nav>
                    <ul class="pagination">
                      <li>
                        <a aria-label="Previous" href="#">
                          <span aria-hidden="true">«</span>
                        </a>
                      </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a aria-label="Next" href="#">
                          <span aria-hidden="true">»</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
          
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>


	@endsection