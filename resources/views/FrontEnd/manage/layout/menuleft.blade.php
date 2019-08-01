<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a  class="simple-text logo-normal">
            Manage Page
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            <li class="nav-item active ">
                <a class="nav-link" href="{{url('manage/dashboard')}}">
                    <i class="material-icons">person</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('manage.leave')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Leave</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('manage.announcement')}}">
                    <i class="material-icons">notifications_active</i>
                    <p>Announcement</p>
                </a>
            </li>
           

        </ul>
    </div>
</div>
<script>
    $('.nav-item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

</script>
