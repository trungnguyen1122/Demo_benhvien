@extends('FrontEnd.doctor.layout.layout')
@section('main')
<?php
$arr = "";
if(isset($phpJson)) {
    $arr = $phpJson;
}
?>
<script>
    var arr = <?php echo $arr?>;
    console.log(arr);
    var names = arr.map(function(item) {
        return item.name;
    });

    $( function() {
        $( '#tags' ).autocomplete({
            source: names
        });
    });
    

</script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title ">Add Prescription</h3>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary" style="font-weight: bold">

                                        <th style="font-weight: bold">Tên thuốc</th>
{{--                                        <th style="font-weight: bold">Đơn vị</th>--}}
                                        <th style="font-weight: bold">Số lượng</th>
                                        <th style="font-weight: bold">Hướng dẫn</th>
                                        <th style="font-weight: bold">Thao Tác</th>


                                        </thead>

                                        <tbody id="t">
                                        {{csrf_field()}}



                                        </tbody>

                                    </table>
                                    <form action="{{route('doctor.hello')}}" method="get">
                                        <button onclick="myFunction({{$user->user_id}})">Submit</button>
                                    </form>

                                </div>
                            </div><br>

                        </div>
                    </div>

                </div>
            </div>
        </div>
<script>
    var i = 0;
    var input = document.getElementById("tags");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            document.getElementById("t").innerHTML += '<tr class="myDIV">'+
            '<td >'+input.value+'</td>'+
                '<td ><input type="number" min="1"></td>'+
                '<td ><input type="text" value=""></td>'+
                '<td><button class="remove">xoa</button></td>'+
            "</tr>";
            i++;
            input.value = "";
        }
    });

    function myFunction(user_id) {
        var c = document.getElementsByClassName("myDIV");
        var arr = [];
        var t1,t2,t3;
        var data ={};
        for (var i = 0; i < c.length; i++) {
                var tr_arr = c[i].children;
                t1 = tr_arr[0].innerHTML;
                var tt1 = tr_arr[1].dafchildren;
                t2 = tt1[0].value;
                var tt2 = tr_arr[2].children;
                t3 = tt2[0].value;
                data = {'ten': t1 ,'soluong': t2 ,'cachdung': t3};
                arr.push(data);
            }
            var text = JSON.stringify(arr);
            $.ajax({
                type: 'POST',
                url: '{{route('user.addMedicine')}}',
                data: {
                    _token: '{!! csrf_token() !!}',
                    'data': text,
                    'user_id': user_id
                },
                success: function (result) {

                }
            });

        }

    $(document).on('click','.remove',function () {
        $(this).parent().parent().remove();
    })
</script>
    @stop

