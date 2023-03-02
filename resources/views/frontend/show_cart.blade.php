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
      <!-- card start -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <table class="table border my-5 ">
                        <tr>
                            <th>Sl</th>
                            <th>Product Image</th>
                            <th>Product Title</th>
                            <th>Product Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php
                         $totalPrice = 0;
                         $totalQuantity = 0;
                          ?>
                        @foreach ($carts as $sl => $cart)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>
                                <img width="120px" src="{{ asset('product/'.$cart->image) }}" alt="{{ $cart->title }}">
                            </td>
                            <td>{{ $cart->product_title }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>${{ $cart->price }}</td>
                            <td>
                                <a href="{{ route('frontend.product_details', $cart->product_id) }}" class="btn btn-outline-info">View</a>
                                <form action="{{ route('frontend.destroy_cart', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mt-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                         $totalPrice = $totalPrice + $cart->price;
                         $totalQuantity = $totalQuantity + $cart->quantity
                          ?>
                        @endforeach
                    </table>
                </div>
                <div class="mb-5">
                    <h2 style="font-size:22px">Total Quantity: {{ $totalQuantity }}</h2>
                    <h2 style="font-size:22px">Total Price: ${{ $totalPrice }}</h2>
                </div>
            </div>
            <div class="m-auto text-center">
                <h1 style="font-size: 30px" class="my-3">Proceed To Order</h1>
                <div class="mb-5">
                    <a href="{{ route('frontend.cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                    <a href="{{ route('frontend.stripe',$totalPrice) }}" class="btn btn-danger">Pay Using Card</a>
                </div>
            </div>
        </div>
      <!-- card end -->
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
