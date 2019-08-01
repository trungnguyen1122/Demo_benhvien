<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{asset('receptionist')}}/booking" class="simple-text logo-normal">
           Receptionist Page
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">


            <li class="nav-item active ">
                <a class="nav-link" href="{{asset('receptionist')}}/getBooking">
                    <i class="material-icons">content_paste</i>
                    <p>Booking</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{asset('')}}receptionist/patientlist">
                    <i class="material-icons">library_books</i>
                    <p>Patient List</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{asset('')}}receptionist/formconfirm">
                    <i class="material-icons">assignment_turned_in</i>
                    <p>Confirm</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    $('.nav-item').click(function() {
        $(this).parent().addClass('active').siblings().removeClass('active');

    });</script>
