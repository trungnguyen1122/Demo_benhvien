
<div class="content">
        <div class="container-fluid">
            <div class="col " >
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>Cộng hòa Xã hội Chủ nghĩa Việt Nam</h4>
                            <h4>Độc lập - Tự do - Hạnh phúc</h4>
                            <h4>-----------------------------------</h4>
                            <h2>GIẤY BỆNH ÁN</h2>
                        </center>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3>I. Thông tin </h3>
                        <h4>1. Họ và tên: {{Illuminate\Support\Facades\Auth::user()->name}}</h4>
                        <h4>3. Giới tính: {{Illuminate\Support\Facades\Auth::user()->gender}}</h4>
                        <h4>5. Địa chỉ : {{Illuminate\Support\Facades\Auth::user()->address}}</h4>
                    </div>
                    <div class="col-md-6">
                        <h3></h3><br><br>
                        <h4>2. Ngày sinh : {!! Auth::user()->birthday; !!}</h4>
                        <h4>4. Số điện thoại : {{Illuminate\Support\Facades\Auth::user()->phone}}</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>II. Chuẩn đoán</h3>
                        <h4>1.Chuẩn đoán</h4>
                        {!! $order->chuan_doan !!}
                        <h4>2. Nguyên nhân</h4>
                        {!! $order->nguyen_nhan !!}
                        <h4>3. Hướng chữa trị</h4>
                        {!! $order->dieu_tri !!}
                    </div>

                </div><br>
                        <div class="foot" style="float: right">
                        <CENTER>
                            <h4>{{$order->datetime}}</h4>
                            <h4>Người khám </h4>
                            <h4>.....</h4>
                        </CENTER></div>

                </div>

            </div>
        </div>




    <style>
        h4{
            font-size: 15px;
        }
        h3{
            font-size: 20px;
            font-weight:bold;
        }
        h2{
            font-weight: bold;
        }
    </style>
