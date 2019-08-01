<!DOCTYPE html>
<html lang="en">
@include('FrontEnd.user.head')


<body>
<div class="wrapper ">
    @include('FrontEnd.user.menuleft')
    <div class="main-panel">
        <!-- Navbar -->
    @include('FrontEnd.user.menutop')
    <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 m-auto">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Booking</h4>

                    </div>
                    <br>


                        <div class="content-tb" style="margin-left: 50px;">
                    <div class="item form-group">
                                <div class="row">
                                <label class=" col-md-6 "  for="email">User Name
                                </label>
                                    <label class=" col-md-6 " for="email">Birth Day
                                    </label>
                                </div>
                                <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                            </div>


                    <div class="item form-group">
                        <div class="row">
                            <label class=" col-md-6 "  for="email">Email
                            </label>
                            <label class=" col-md-6 " for="email">Phone
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                    </div>

                    <div class="item form-group">
                        <div class="row">
                            <label class=" col-md-12 "  for="email">Address
                            </label>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>

                    </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>


                    </div>
                </div>
                </div>
            </div>
        </div>

</div>
</div>
</div>
</div>


</body>

</html>
