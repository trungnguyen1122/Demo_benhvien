@extends('FrontEnd.user.layout.layout')
@section('main')
    <div class="content" >
        <div class="container-fluid">
            <div class="col-md-10 m-auto" id="calendar" >
                <div class="row" id="head">
                    <div class="col-md-12 m-auto" >
                        <center>Booking</center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 title"><h3>Date</h3></div>
                </div>

                <div class="row">
                    <?php $today = Carbon\Carbon::now();
                    $date = Carbon\Carbon::now();
                    ?>
                    <div class="col-md-4 day active" onclick="disableTime()"  value="{!! $today !!}" id="hom_nay" >{!! $date->format('d-m') !!}</div>
                    <div class="col-md-4 day" onclick="enable()" value="{!! $today->addDays(1) !!}" id="ngay_mai">{!! $date->addDays(1)->format('d-m') !!}</div>
                    <div class="col-md-4 day" onclick="enable()" value="{!! $today->addDays(1) !!}" id="ngay_kia">{!! $date->addDays(1)->format('d-m') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12 title"><h3>Time</h3></div>
                </div>
                <div class="row" id="body">
                    <div class="col-md-3 hour "  value="08">
                        <div class="row"><h3>8:00</h3></div>
                        <div class="row num"><h6></h6></div>
                    </div>
                    <div class="col-md-3 hour " value="09">
                        <div class="row"><h3>9:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-md-3 hour " value="10">
                        <div class="row"><h3>10:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-md-3 hour " value="11">
                        <div class="row"><h3>11:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 hour " value="12">
                        <div class="row"><h3>12:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-md-3 hour " value="13">
                        <div class="row"><h3>13:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-md-3 hour" value="14">
                        <div class="row"><h3>14:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-md-3 hour" value="15">
                        <div class="row"><h3>15:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 hour"value="16">
                        <div class="row"><h3>16:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-md-3 hour" value="17">
                        <div class="row"><h3>17:00 </h3></div>
                        <div class="row num"><h6>1/10</h6></div>
                    </div>
                    <div class="col-3" >

                    </div>
                    <div class="col-3" >

                    </div>
                </div>


            </div>
            <button class="btn btn-success" id="popup"  style="margin-left: 70%">Đặt lịch</button>


            <div id="myModal" class="Modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <center><h2>Thông tin</h2></center>
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-4"><h4>Chọn Khoa khám:</h4></div>
                                    <div class="col-md-4">
                                        <select id="khoa" name="khoa" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            <option value="1">Da liễu</option>
                                            <option value="2">Nhi khoa</option>
                                            <option value="3">Tiêu hoá</option>
                                            <option value="4">Nha khoa</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="question">
                                    <div class="col-md-10"><h4>Bạn bị ở bộ phận nào?</h4></div>
                                    <div class="col-md-10">
                                        <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                                    </div>


                                    <div class="col-md-10"><h4>Bạn cảm thấy thế nào?                                                          </h4></div>
                                    <div class="col-md-10">
                                        <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                                    </div>


                                    <div class="col-md-10"><h4>Cảm quan bằng mắt?</h4></div>
                                    <div class="col-md-10">
                                        <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                                    </div>


                                    <div class="col-md-10"><h4>Mô tả thêm</h4></div>
                                    <div class="col-md-10">
                                        <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <button class="btn btn-primary cancel">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" onclick="datlich()" class="btn btn-success">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('select').on('change', function () {

            var data = this.value;
           $.ajax({
               method: 'get',
               url: '{{route('user.getQuestion')}}',
               data: { data: data},
               success: function (result) {
                    $('#question').html(result);
               }
           })
        });
        var arr = [];
        $(document).ready(function() {
            arr = <?php echo json_encode($data) ?>;
            $('.num > h6').each(function (index)  {
                $(this).html(arr[index]+'/10');
                if (arr[index]==10){
                    $(this).parent().parent().addClass('disable');
                }
            });

            $(' .hour').click(function() {
                if($(this).hasClass('disable')) {
                    $("#popup").attr('disabled', 'disabled');
                }
                else $("#popup").removeAttr('disabled');
            });

        });
        $('.day').click(function () {
            $('.col-md-3').removeClass('active');
            $('#popup').attr('disabled', 'disabled');
            $(this).addClass('active').siblings().removeClass('active');

        });
        $('#hom_nay').click(function () {
            $('.num > h6').each(function (index)  {
                $(this).html(arr[index]+'/10');
                if (arr[index]==10){
                    $(this).parent().parent().addClass('disable');
                }
            });
        });
        $('#ngay_mai').click(function () {
            $('.num > h6').each(function (index)  {
                $(this).html(arr[index+10]+'/10');
                if (arr[index+10]==10){
                    $(this).parent().parent().addClass('disable');
                }
            });
        });
        $('#ngay_kia').click(function () {
            $('.num > h6').each(function (index)  {
                $(this).html(arr[index+20]+'/10');
                if (arr[index+20]==10){
                    $(this).parent().parent().addClass('disable');
                }
            });
        });


        $('.col-md-3').click(function () {
            $('.col-md-3').removeClass('active');
            $(this).addClass('active');
        });
        function datlich() {
            var khoa  = document.getElementsByName('khoa')[0].value;

            var answer = $('textarea').map(function() {
                return $.trim(this.value);
            }).get();
            var str = JSON.stringify(answer);
            var dayEl = $('.col-md-4.active');
            var datetime = dayEl.attr('value');
            var arr = datetime.split(' ');
            var date = arr[0];

            var timeEl = $('.col-md-3.active');
            var time = timeEl.attr('value');
            var date_time = date + ' ' + time;
            var data = {
                'user_id': '{{Auth::user()->user_id}}',
                'date_time': date_time
            };
            $.ajax({
                method: 'get',
                url: '{{route('user.confirm')}}',
                data: {
                    'data': data,
                    'khoa': khoa,
                    'answer': str
                },
                success: function (a) {

                }
            });
            modal.style.display = "none";
            alert("Bạn đã đăng kí thành công!!!");
        }
        function enable() {
            return $('.hour').removeClass('disable');
        }
        function disableTime() {

            var now = new Date();
            var now_hour = now.getHours();
            $('.hour').each(function (index, value) {

                if ($(this).attr('value')<= now_hour+2){
                    $(this).addClass('disable');
                }
            });
        };
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("popup");
        var cancel = document.getElementsByClassName("cancel")[0];
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        cancel.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


    </script>
    <style>
        .row .disable{
            background-color: rgba(0,0,0,0.6);
            color: #FFFFFF;
        }
        #calendar .row .col-md-4.day{
            height: 100px; font-size: 25px;border-bottom: 1px dotted grey;border-right: 1px solid black;text-align: center;font-weight: bold;color: #0c83e2;line-height: 100px;
        }
        #calendar .row .col-md-12.title{
            background-color: rgba(46,171,13,0.84);
        }
        #calendar .row .col-md-12.title h3{
            color: #FFFFFF;text-align: center;font-weight: bold;
        }
        .row .active{
            background-color: rgba(0,0,0,0.24);
        }


        .Modal{ display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 100;/* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.7); /* Black w/ opacity */}
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
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
            cursor: pointer;
        }
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
        input{
            border-radius: 3px;
        }
    </style>
@stop