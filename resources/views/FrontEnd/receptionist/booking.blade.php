@extends('FrontEnd.receptionist.layout.layout')
@section('main')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Booking</h4>

                    </div>
                    <br>

                        <div class="content-tb" style="margin-left: 50px;">
                            <div class="item form-group">
                                <div class="row">
                                    <label class=" col-md-6 " >Họ tên</label>
                                    <label class=" col-md-6 " >Ngày sinh</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="username" id="username1" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="birthday" id="birthday1" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                            </div>


                            <div class="item form-group">
                                <div class="row">
                                    <label class=" col-md-6 "  for="email">Email</label>
                                    <label class=" col-md-6 " >Số điện thoại</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email"  id="email1" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="phone" id="phone1" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                            </div>

                            <div class="item form-group">
                                <div class="row">
                                    <label class=" col-md-12 "  >Địa chỉ</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="address" id="address1" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 ">
                                    <button class="btn btn-primary" id="popup">Tình trạng</button>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <center><h2>Thông tin</h2></center>
        <div class="row">
            <div class="col-md-6 m-auto">

                    <div class="row">
                        <div class="col-md-4"><h4>Chọn Khoa khám:</h4></div>
                        <div class="col-md-4">
                            <select id="khoa" name="khoa" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option value="1">Khoa nội</option>
                                <option value="2">Khoa ngoại</option>
                            </select>
                        </div>
                    </div>


                    <div id="question">
                        <div class="col-md-10"><h4>Anh(Chị) bị đau ở vùng nào trên cơ thể?</h4></div>
                        <div class="col-md-10">
                            <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                        </div>


                        <div class="col-md-10"><h4>Anh(Chị) bị đau ở đó bao lâu rồi?</h4></div>
                        <div class="col-md-10">
                            <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                        </div>


                        <div class="col-md-10"><h4>Anh(Chị) đã từng khám ở đâu chưa?</h4></div>
                        <div class="col-md-10">
                            <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                        </div>


                        <div class="col-md-10"><h4>Trước đây anh(chị) đã từng bị những bệnh nào chưa? Nếu có nêu các bệnh đó ra.</h4></div>
                        <div class="col-md-10">
                            <textarea name="question"  cols="70" rows="1" required="required"></textarea>
                        </div>
                    </div>
                    <input type="text" name="username" id="username" style="display: none;" value="">
                    <input type="text" name="birthday" id="birthday" style="display: none;" value="">
                    <input type="text" name="email" id="email"style="display: none;" value="">
                    <input type="text" name="phone" id="phone"style="display: none;" value="">
                    <input type="text" name="address"style="display: none;" id="address">
                    <div class="form-group" >
                        <button class="btn btn-primary cancel">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button  onclick="datlich()" class="btn btn-success">Submit</button>

                    </div>

            </div>
        </div>
    </div>
</div>


    <style>
        label{
        font-weight: bold;
        color: black;
        .modal{ display: none; /* Hidden by default */
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
    }</style>
<script>
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
    $('select').on('change', function () {

        var data = this.value;

        $.ajax({
            method: 'get',
            url: '{{route('user.getQuestion')}}',
            data: { data: data},
            success: function (result) {
                $('#question').html(result);
            }
        });
    });
     function datlich() {
         var name = document.getElementById('username1').value;
         var birthday = document.getElementById('birthday1').value;
         var email = document.getElementById('email1').value;
         var phone = document.getElementById('phone1').value;
         var address = document.getElementById('address1').value;

         var khoa  = document.getElementsByName('khoa')[0].value;
         var answer = $('textarea').map(function() {
             return $.trim(this.value);
         }).get();
         var str = JSON.stringify(answer);

         var data = {
             'name' : name,
             'birthday': birthday,
             'email': email,
             'phone' : phone,
             'address': address,
             'khoa_id': khoa,
             'answer': str
         };
         $.ajax({
             method: 'get',
             url: '{{route('receptionist.addUser')}}',
             data: {
                 'data': data
             },
             success: function (result) {

             }
         });


    }
</script>
    @stop