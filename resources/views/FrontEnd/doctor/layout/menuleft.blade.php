<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{asset('')}}h" class="simple-text logo-normal">
            Doctor Page
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            <li class="nav-item {{Request::is('doctor')? 'active':null}}">
                <a class="nav-link" href="{{asset('')}}doctor">
                    <i class="material-icons">person</i>
                    <p>Doctor Profile</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('doctor/patientlist')? 'active':null}}">
                <a class="nav-link" href="{{asset('doctor')}}/patientlist">
                    <i class="material-icons">library_books</i>
                    <p>Patient List</p>
                </a>
            </li>
    

        </ul>
    </div>
</div>
