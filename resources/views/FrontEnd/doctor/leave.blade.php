@extends('FrontEnd.doctor.layout.layout')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title ">Đơn nghỉ</h3>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead class=" text-primary">
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Mã nhân viên</th >
                                    <th>Chức vụ</th>
                                    <th>Từ ngày</th>
                                    <th>Đến ngày</th>
                                    <th>Bắt đầu</th>
                                    <th>Kết thúc</th>
                                    <th>Lý do</th>
                                    <th>Ngày lập</th>
                                    <th>Trạng thái</th>
                                    </thead>
                                    <tbody>
                                    <tr><?php $i=1 ?>
                                        <td>{{$i++}}</td>
                                        <td>Trung</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if (0==1)
                                            <td><button id="succes">Succes</button></td>
                                        @endif
                                        @if (0==0)
                                            <td><button id="disable">Disable</button></td>
                                        @endif

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="myModal" class="Modal">
        <!-- Modal content -->
        <div class="Modal-content">
            <span class="close">&times;</span>
           <center><h2>Đăng kí ngày nghỉ</h2></center>
            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="">
                    <div class="row">
                        <div class="col-md-4"><h4>Ngày nghỉ</h4></div>
                        <div class="col-md-8">
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="datetimepicker" type="text" required="required">
                                <i class="material-icons">insert_invitation</i>
                            </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-4"><h4>Ngày đi làm</h4></div>
                        <div class="col-md-8">
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="datetimepicker1" type="text" required="required">
                                <i class="material-icons">insert_invitation</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h4>Giờ bắt đầu</h4></div>
                        <div class="col-md-8">
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="datetimepicker2" type="text" required="required">
                                <i class="material-icons">access_time</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h4>Giờ kết thúc</h4></div>
                        <div class="col-md-8">
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="datetimepicker3" type="text" required="required">
                                <i class="material-icons">access_time</i>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4"><h4>Lý do</h4></div>
                            <div class="col-md-8">
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input type="text" required="required">
                                </div>
                            </div>
                        </div>
                    <div class="form-group" >
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                </div>
        </div>


        </div></div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        $(function () {
            $('#datetimepicker').datetimepicker({
                format: 'DD/MM/YYYY'
            });
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
    </script>
    <style>
        .Modal {
            z-index: 1000;
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
        }

        /* Modal Content */
        .Modal-content {
            z-index: 1000;
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;}
        .row .col-md-4 h4{
            font-weight: bold;
        }
        .row .col-md-6 .row{
            padding-bottom: 30px;
        }
        h2{
            font-weight: bold;
            padding-bottom: 30px;
        }
        .row i{
            padding-left: 10px;
        }
    </style>
@stop
