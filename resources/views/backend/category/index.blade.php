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
                    <h1 class="text-center my-4 display-4">All Category</h1>
                    <form action="{{ route('backend.category.store') }}" method="POST">
                      @csrf
                        <input type="text" class="text-dark" name="category" placeholder="write category name" />
                        <input class="btn btn-outline-light py-2 px-3" type="submit" name="submit" value="Add Category"/>
                    </form>
                    <div class="row d-flex justify-content-center">
                      <div class="col-sm-6">
                        <table class="table border my-5" >
                          <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                          </tr>
                          @foreach ($categorys as $category)
                          <tr>
                            <td>{{ $category->category_name }}</td>
                            <td><a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-outline-danger" href="{{ route('backend.category.destroy', $category->id) }}">Delete</a></td>
                          </tr>
                          @endforeach
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
