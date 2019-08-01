@extends('FrontEnd.doctor.layout.layout')
@section('main')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title ">Patient List</h3>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class=" text-primary">
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ </th>
                                        <th>Chọn bệnh nhân</th>
                                        <th>Trạng thái</th>
                                        </thead>
                                        <tbody id="tbody">
                                        <?php $i = 1; ?>
                                        @if(isset($nodes))
                                            @foreach($nodes as $node)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{ $node->user()->first()->name}}</td>
                                                    <td>{{ $node->user()->first()->phone}}</td>
                                                    <td>{{ $node->user()->first()->address}}</td>

                                                    <td>
                                                        <form action="{{route('doctor.popPatient')}}" method="get">

                                                            <input type="text" name = "user_id" style="display: none" value="{{$node->user_id}}">
                                                            <button  type="submit"><i class="material-icons">assignment</i></button>
                                                        </form>
                                                    </td>
                                                    @if ($node->status==0)
                                                        <td><button id="disable">Chưa sẵn sàng</button></td>
                                                    @endif
                                                    @if ($node->status==1)
                                                        <td><button id="succes">Sẵn sàng</button></td>
                                                    @endif
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
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="//js.pusher.com/3.1/pusher.min.js"></script>

<script>

    var pusher = new Pusher('dc46373c6adbbc8a6695', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('updateStatus');

    channel.bind('App\\Events\\UpdateStatusQueue', function () {
        $.ajax({
            method: "get",
            url: "{{url('user/ajaxtable')}}",
            success: function (data) {
                $('#tbody').html(data);
            }
        });
    });
    var channel2 = pusher.subscribe('doctorGetPatient');
    channel2.bind('App\\Events\\DoctorGetPatient', function (d) {
        if(d.user_id != {!! Auth::user()->user_id !!}) {
            $.ajax({
                method: "get",
                url: "{{url('user/ajaxtable')}}",
                success: function (data) {
                    $('#tbody').html(data);
                }
            });
        }

    });

    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }</script>
@stop
