<!DOCTYPE html>
<html lang="en">
@include('FrontEnd.receptionist.layout.head')
<body>
<div class="wrapper ">
    @include('FrontEnd.receptionist.layout.menuleft')
    <div class="main-panel">
        <!-- Navbar -->
    @include('FrontEnd.receptionist.layout.menutop')
    <!-- End Navbar -->
        @yield('main')
    </div>
</div>
</body>

</html>
