@extends('FrontEnd.doctor.layout.layout')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5" >
                    <center>
                        <h2>Đơn thuốc</h2>
                    </center>
                    <table style="width: 100%;border: 1px solid black">
                        <tr id="title">
                            <td>STT</td>
                            <td>Tên thuốc</td>
                            <td>Đơn vị</td>
                            <td>Số lượng</td>
                            <td>Cách dùng</td>
                        </tr>
                        <tr>
                            <?php $i=1 ?>
                            <td>{{$i++}}</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                    </table>

                    <br>
                    <div class="foot" style="float: right">
                        <CENTER>
                            <h4>Hà Nội, ngày....tháng....năm</h4>
                            <h4>Người khám </h4>
                            <h4>.....</h4>
                        </CENTER></div>
                </div>
                <div class="col-md-6">
                    <center>
                        <h4>Cộng hòa Xã hội Chủ nghĩa Việt Nam</h4>
                        <h4>Độc lập - Tự do - Hạnh phúc</h4>
                        <h4>-----------------------------------</h4>
                        <h2>GIẤY BỆNH ÁN</h2>
                    </center>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>I. Thông tin</h3>
                            <h4>1. Họ và tên: </h4>
                            <h4>3. Giới tính: </h4>
                            <h4>5. Địa chỉ : </h4>
                        </div>
                        <div class="col-md-6">
                            <h3></h3><br><br>
                            <h4>2. Ngày sinh : </h4>
                            <h4>4. Số điện thoại : </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>II. Chuẩn đoán</h3>
                            <h4>1.Chuẩn đoán</h4>
                            <h4>- AAAAAAAAAAAAAA</h4>
                            <h4>2. Nguyên nhân</h4>
                            <h4>- AAAAAAAAAAAAAA</h4>
                            <h4>3. Hướng chữa trị</h4>
                            <h4>- AAAAAAAAAAAAAA</h4>
                        </div>

                    </div><br>
                    <div class="foot" style="float: right">
                        <CENTER>
                            <h4>Hà Nội, ngày....tháng....năm</h4>
                            <h4>Người khám </h4>
                            <h4>.....</h4>
                        </CENTER></div>
                </div>

            </div>
        </div>
    </div>

@stop
