<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('frontend.index') }}"><img width="250" src="{{ asset('images/logo.png') }}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('frontend.index') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.show_cart') }}">Cart</a>
                 </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
                @auth
                <x-app-layout>
                </x-app-layout>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="btn btn-dark mx-1" href="{{ route('login') }}">LogIn</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark mx-1" href="{{ route('register') }}">Register</a>
                </li>
                @endguest
             </ul>
          </div>
       </nav>
    </div>
 </header>
