@extends('FrontEnd.receptionist.layout.layout')
@section('main')
    <center><h2>{{$done_time}}</h2></center>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-pr.imary">
                    <h3 class="card-title ">Patient List</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            </thead>
                            <?php $i=1; ?>
                            @if(isset($nodes))
                                @foreach($nodes as $node)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $node->user()->first()->name}}</td>
                                        <td>{{$node->user()->first()->address}}</td>
                                        @if ($node->status==1)
                                            <td><button id="succes">Sẵn sàng</button></td>
                                        @endif
                                        @if ($node->status==0)
                                            <td><button id="disable">Chưa xác nhận</button></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    @stop