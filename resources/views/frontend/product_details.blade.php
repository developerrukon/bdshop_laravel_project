<!DOCTYPE html>
<html>
   <head>
    @include('frontend.css')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('frontend.header')
         <!-- end header section -->
      <!-- footer start -->
      <!-- product details start -->
      <div class="container">
        <div class="col-sm-6 col-md-4 col-lg-4 m-auto width:50% padding:30px">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <div class="img-box">
                           <img src="{{ asset("product/".$product->image) }}" alt="{{ $product->title }}">
                        </div>
                        <div class="detail-box">
                           <h5>
                              {{ $product->title }}
                           </h5>
                           @if ($product->discount_price!=null)
                           <h6 class="text-danger">
                             Discount Price
                             <br/>
                              ${{ $product->discount_price }}
                           </h6>
                           <h6  style="text-decoration: line-through; color:blue">
                             Price
                             <br/>
                              ${{ $product->price }}
                           </h6>
                           @else
                           <h6 class="text-primary">
                             Price
                             <br/>
                              ${{ $product->price }}
                           </h6>
                           @endif
                           <h6>Product Category: {{ $product->category }}</h6>
                           <h6>Product Details: {{ $product->description }}</h6>
                           <h6>Abaileable Quantity: {{ $product->quantity }}</h6>
                           <form action="{{ route('frontend.add_cart', $product->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px"/>

                                </div>
                                <div class="col-sm-4">
                                    <input type="submit"  value="Add to Card"/>
                                </div>
                             </div>
                         </form>
                        </div>
                     </div>
                </div>
            </div>

         </div>
      </div>

      <!-- product details end -->
      @include('frontend.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
     @include('frontend.script')
   </body>
</html>
