@extends('FrontEnd.user.layout.layout')
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title ">Lịch sử bệnh án </h3>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead class=" text-primary">
                                    <th>No.</th>
                                    <th>Ngày khám</th>
                                    <th>Chuẩn đoán</th>
                                    <th>Chi tiết</th>
                                    <th>Đơn thuốc</th>

                                    </thead>
                                    <tbody>
                                             <?php $i=1?>
                                             @if(isset($orders))
                                                @foreach($orders as $o)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$o->creation_date}}</td>
                                                <td>{!! $o->chuan_doan !!}</td>
                                                <td><a href="{{url('medicalrecord/')."/".$o->order_id}}" rel="modal:open"><i class="material-icons">assignment</i></a></td>
                                                <td><a href="{{url('prescription/')."/".$o->order_id}}" rel="modal:open"><i class="material-icons">assignment</i></a></td>
                                            </tr>
                                                @endforeach
                                             @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
