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
        @include('backend.admin.body')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('backend.admin.script')
    @include('flash_message')
  </body>
</html>
