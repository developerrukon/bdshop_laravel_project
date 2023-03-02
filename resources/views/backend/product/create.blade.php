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

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                    <div class="text-center my-3">
                        @if (session()->has('message'))
                            <h4 class="text-success">{{ session()->get('message') }}</h4>
                        @endif
                    </div>
                    <h1 class="m-0 display-3 text-center mb-4">Add Product</h1>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="py-3 mx-1">
                                    <div class="card-hader text-center">
                                        <h2 class="display-4 mt-4">Post Create</h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('backend.product.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!--title title-->
                                            <div class="form-group my-2">
                                                <label class="form-label">Product Title</label>
                                                <input type="text" name="title"
                                                    class="form-control text-light bg-dark border"
                                                    @error('title') is-invalid @enderror placeholder="product title"
                                                    value="{{ old('title') }}" required="" />
                                            </div>
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">please.! title max 50 character</small>
                                            <!--price input-->
                                            <div class="form-group my-2">
                                                <label class="form-label">Product price</label>
                                                <input type="text" name="price"
                                                    class="form-control text-light bg-dark border"
                                                    @error('price') is-invalid @enderror placeholder="product price"
                                                    value="{{ old('price') }}" required="" />
                                            </div>
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--discount price input-->
                                            <div class="form-group my-2">
                                                <label class="form-label">discount price</label>
                                                <input type="text" name="discount_price"
                                                    class="form-control text-light bg-dark border"
                                                    placeholder="discount price" value="{{ old('discount_price') }}" />
                                            </div>

                                            <!--product quantity input-->
                                            <div class="form-group my-3">
                                                <label class="form-label">Product Quantity</label>
                                                <input type="number" name="quantity"
                                                    class="form-control text-light bg-dark border"
                                                    @error('discountprice') is-invalid @enderror
                                                    placeholder="product quantity" value="{{ old('quantity') }}"
                                                    required="" />
                                            </div>
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <!--description input-->
                                            <div class="form-group">
                                                <label class="form-label">Product Body:</label>
                                                <textarea name="description" required="" rows="4" class="form-control text-light bg-dark border">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">please.! description max 2000
                                                    character</small>

                                            </div>
                                            <!--product category-->
                                            <!--product quantity input-->
                                            <div class="form-group">
                                                <label class="form-label">Product Category</label>
                                                <select name="category" class="form-control text-light bg-dark border"
                                                    required="">
                                                    <option selected value="">Add a Category Here</option>
                                                    @forelse ($categorys as $category)
                                                        <option value="{{ $category->category_name }}">
                                                            {{ $category->category_name }}</option>
                                                    @empty
                                                        <option>Empty Category</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <!--product image-->
                                            <div class="form-group mb-1">
                                                <label class="form-label">Product Image</label>
                                                <input type="file" required="" name="image" class="form-control"
                                                    @error('discountprice') is-invalid @enderror
                                                    placeholder="product image" />
                                            </div>
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--submit button -->
                                            <div class="form-group my-3">
                                                <button type="submit" name="submit"
                                                    class="btn btn-outline-success">Add Product</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
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
