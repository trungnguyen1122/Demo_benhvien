@extends('FrontEnd.receptionist.layout.layout')
@section('main')
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Confirm Customer</h4>
                            </div>


                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table" id="myTable">
                                        <thead class=" text-primary">
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Số điện </th>
                                        <th>Địa chỉ</th>
                                        <th>Thời gian</th>
                                        <th>Xác nhận</th>
                                        </thead>
                                        <?php $i=1; ?>
                                        @if(isset($list))

                                            @foreach($list as $item)

                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{ $item->user()->first()->name}}</td>
                                                    <td>{{$item->user()->first()->birthday}}</td>
                                                    <td>{{ $item->user()->first()->phone}}</td>
                                                    <td>{{ $item->user()->first()->address}}</td>
                                                    <td>{{$item->datetime}}</td>
                                                        <td>
                                                            <form action="{{route('receptionist.confirm')}}" method="GET">
                                                                <button id="disable" type="submit">Xác nhận</button>
                                                                <input type="text" style="display: none;" name="user_id" value="{{$item->user_id}}">
                                                            </form>
                                                        </td>
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

        </div>

<script>
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