@extends('FrontEnd.user.layout.layout')
@section('main')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}"required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Birth Day</label>
                                        <input type="text" name="birthday" class="form-control" value="<?php
                                        $date = Auth::user()->birthday;
                                        if($date != null) {
                                            $arr = [];
                                            $arr = preg_split('/\-/', $date);
                                            $str = "";
                                            $str = $arr[2];
                                            $day = preg_split('/ /', $str);
                                            echo $day[0]."/".$arr[1]."/".$arr[0];
                                        }
                                        ?>" placeholder="DD/MM/YYYY" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}"required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Gender</label>
                                        <select class="form-control" name="gender" required="required">
                                            <option value="Nam" <?php if(Auth::user()->gender=="Nam") echo "SELECTED";?> >Nam</option>
                                            <option value="Nữ"<?php if(Auth::user()->gender=="Nữ") echo "SELECTED";?> >Nữ</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" name="image" class="form-control">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Update Profile -->
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img src="{{asset('')}}uploads/image/{{Auth::user()->image}}" alt="" width="150px" height="150px">

                        </a>

                    </div>
                    <h3>Avatar Image</h3>
                </div>

            </div>
        </div>
    </div>
</div>
    @stop