<!DOCTYPE html>
<html lang="en">
@include('FrontEnd.doctor.layout.head')


<body class="">
<div class="wrapper ">
    @include('FrontEnd.doctor.layout.menuleft')
    <div class="main-panel">
        <!-- Navbar -->
    @include('FrontEnd.doctor.layout.menutop')
    <!-- End Navbar -->
      @yield('main')
    </div>
</div>

</body>

</html>
