<!DOCTYPE html>
<html lang="en">

 
 
 
<head>

    @include('Tenancy.layouts.header')


  
</head>


<body dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"  >
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Tenancy.layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('Tenancy.layouts.aside')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('body')
        </div>
     
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('Tenancy.layouts.footer')
 
</body>

</html>

