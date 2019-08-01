@extends('FrontEnd..user.layout.layout')
@section('main')

    <div class="content">
        <div class="container-fluid">
            <div class="col-md-8 m-auto" style="border: solid 1px black; background: #FFFFFF;box-shadow: 5px 10px 8px #888888;">
              <center><h3>Đăng kí thành công</h3>
                  <h4>Cảm ơn bạn đã đăng kí. Yêu cầu bạn có mặt trước 15 phút để xác nhận khám bệnh!!</h4><hr>
              </center>
                        <h3>Thông tin</h3>
                <div class="row">
                    <div class="col-md-4"><h4> Tên: {{Illuminate\Support\Facades\Auth::user()->name}}</h4></div>
                    <div class="col-md-4"><h4> Số điện thoại:{{Illuminate\Support\Facades\Auth::user()->phone}} </h4></div>
                    <div class="col-md-4"><h4> Ngày đặt: {{$b->datetime}}</h4></div>
                </div>
                <hr>
                <center>
                <h3>Hủy đặt</h3>
                <h4>Nếu bạn bận không thể đến, hãy hủy đơn ở nút phía dưới!!</h4></center><br>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <form method="get" action="{{route('user.cancel')}}">
                            <button>Huỷ </button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>

    </div>

    <style>
        h3{
            font-weight: bold;
        }
        td{
            font-size: 20px;
            padding-bottom: 30px;

        }
    </style>
@stop