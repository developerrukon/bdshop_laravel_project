<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('backend.admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="text-center">
                        @if (session()->has('message'))
                            <h4 class="text-success">{{ session()->get('message') }}</h4>
                        @endif
                        <h1 class="text-center display-4">All Product</h1>
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12">
                                <table class="table border my-5">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Discription</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    @if ($products)
                                    @forelse ($products as $product)
                                        <tr>
                                          <td>{{ $product->id }}</td>

                                            <td>
                                              <img width="250px" height="250px" src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}">
                                            </td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ Str::limit($product->description, 50, '...') }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                              <a class="btn btn-outline-primary" href="{{ route('backend.product.edit', $product->id) }}">Edit</a>
                                              <a class="btn btn-outline-danger" href="{{ route('backend.product.destroy',$product->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    @endif
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('backend.admin.script')
</body>

</html>
