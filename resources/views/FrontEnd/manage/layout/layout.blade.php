<!DOCTYPE html>
<html lang="en">
@include('FrontEnd.manage.layout.head')
<body>
<div class="wrapper ">
    @include('FrontEnd.manage.layout.menuleft')
    <div class="main-panel">
        <!-- Navbar -->
    @include('FrontEnd.manage.layout.menutop')
    <!-- End Navbar -->
    @yield('main')
    </div>
</div>
</body>

</html>
