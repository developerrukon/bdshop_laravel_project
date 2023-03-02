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
         <!-- slider section -->
        @include('frontend.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('frontend.why')
      <!-- end why section -->
      <!-- arrival section -->
      @include('frontend.new_arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('frontend.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('frontend.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('frontend.testimonial')
      <!-- end client section -->
      <!-- footer start -->
      @include('frontend.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
     @include('frontend.script')
     @include('flash_message')
   </body>
</html>
