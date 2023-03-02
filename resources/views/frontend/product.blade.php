<style>
   .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #f7444e;
    border-color: #f7444e;
}
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #1e1e1e;
    background-color: #fff;
    border: 1px solid #dee2e6;
}
</style>
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @forelse ($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('frontend.product_details', $product->id) }}" class="option1">
                     Product Details
                     </a>
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
               <div class="img-box">
                  <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}">
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
               </div>
            </div>
         </div>
         @empty
         <span>Product Empty</span>
         @endforelse

       </div>
       <div class="mt-4 d-flex justify-content-center">
         {{ $products->links('pagination::bootstrap-4') }}
       </div>
    </div>
 </section>
