<!DOCTYPE html>
<html lang="en">
@include('FrontEnd.user.layout.head')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5cf75ed1b534676f32ad6997/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<body onload="disableTime()">
<div class="wrapper ">
    @include('FrontEnd.user.layout.menuleft')
    <div class="main-panel">
        <!-- Navbar -->
    @include('FrontEnd.user.layout.menutop')
    <!-- End Navbar -->
    @yield('main')
    </div>
</div>
</body>

</html>
