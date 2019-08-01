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
    <button id="popup" style="padding: 6px 15px 6px 15px;background: none;border: solid 2px #ff2a18;border-radius: 7px;margin-bottom: 30px;" >Thông tin bệnh nhân</button>

    <form action="{{route('doctor.prescription')}}" method="post" id="pri">
        {{ csrf_field()}}
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12" style="border: solid 1px black;background: #FFFFFF;box-shadow: 5px 10px 8px #888888;">
                 <div class="row">
                    <div class="col-md-12">

                         <h4>1.Chuẩn đoán</h4>
                        <textarea name="chuandoan"  id="summernote"  cols="30" rows="10"></textarea>
                        <h4>2. Nguyên nhân</h4>
                        <textarea name="nguyennhan"   id="summernote" cols="30" rows="10"></textarea>
                        <h4>3. Hướng chữa trị</h4>
                        <textarea name="dieutri"   id="summernote" cols="30" rows="10"></textarea>

                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Đơn thuốc</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style="font-weight: bold">

                                <th style="font-weight: bold">Tên thuốc</th>
                                <th style="font-weight: bold">Số lượng</th>
                                <th style="font-weight: bold">Hướng dẫn</th>
                                <th style="font-weight: bold">Thao Tác</th>
                                </thead>
                                <tbody id="t">
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                </div>
            </div>
                <input type="text" name="donthuoc" id="donthuoc" style="display: none"/>
                <input type="text" name="user_id" value="{{$user->user_id}}" style="display: none">
            <button type="submit" onclick="myFunction()">Submit</button>

        </div>
    </form>
</div>
    <div id="myModal" class="Modal">
        <div class="Modal-content">
            <span class="close">&times;</span>
            <center><h2>Thông tin</h2></center>
            <div class="row">
                <div class="col-md-9 m-auto">

                        <div class="row">
                            <div class="col-md-5"><h4>Tên bệnh nhân:</h4></div>
                            <div class="col-md-5">{{$user->name}}</div>
                        </div>


                    @if(isset($rows))
                        @foreach($rows as $i => $k)
                            <div class="row">
                                <div class="col-md-5"><h4>{{$i}}</h4></div>
                                <div class="col-md-5">{{$k}}</div>
                            </div>
                        @endforeach
                    @endif
                </div>


                </div>
            </div>
        </div>
    </div>
    <script>


        $(document).ready(function() {
            $('#summernote').summernote();
        });
        var i = 0;
    var input = document.getElementById("tags");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            document.getElementById("t").innerHTML += '<tr class="myDIV">'+
                '<td >'+input.value+'</td>'+
                '<td ><input type="number" min="1"></td>'+
                '<td ><input type="text" value=""></td>'+
                '<td><button class="remove">xoa</button></td>'+
                '</tr>';
            i++;
            input.value = "";
        }
    });

    function myFunction() {
        var c = document.getElementsByClassName("myDIV");
        var arr = [];
        var t1,t2,t3;
        var data ={};
        for (var i = 0; i < c.length; i++) {
            var tr_arr = c[i].children;
            t1 = tr_arr[0].innerHTML;
            var tt1 = tr_arr[1].children;
            t2 = tt1[0].value;
            var tt2 = tr_arr[2].children;
            t3 = tt2[0].value;
            data = {'ten': t1 ,'soluong': t2 ,'cachdung': t3};
            arr.push(data);
        }
        var text = JSON.stringify(arr);
        var input = document.getElementById("donthuoc").value;

        $( "form" ).submit(function( event ) {
            if (input === "" ) {
                document.getElementById("donthuoc").value = text;
            }
        });

        $( "form" ).keypress(function( event ) {
            if (event.keyCode === 13 ) {
                return false;
            }
        });

    }
    $(document).on('click','.remove',function () {
        $(this).parent().parent().remove();
    })
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
        .Modal-content {
            z-index: 1001;
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
        .row .col-md-5 h4{
            font-weight: bold;
            padding-bottom: 50px;
        }
        .row .col-md-6 .row{
            padding-bottom: 30px;
        }
        h2{
            font-weight: bold;
            padding-bottom: 30px;
        }

    </style>
    @stop