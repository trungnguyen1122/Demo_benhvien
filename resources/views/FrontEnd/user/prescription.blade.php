
<div class="content">
    <div class="container-fluid">
        <div class="col " >
            <div class="row">
                <div class="col-md-12">
                    <center>

                        <h2>Đơn thuốc</h2>
               </center>
                </div>
            </div>
            <table style="width: 100%;border: 1px solid black">
                <tr id="title">
                    <td>STT</td>
                    <td>Tên thuốc</td>
                    <td>Đơn vị</td>
                    <td>Số lượng</td>
                    <td>Cách dùng</td>
                </tr>
                <?php $i=1 ?>
                <?php $arr = $json?>
                @for($j = 0 ; $j < count($arr) ; $j++)
                <tr>

                         <td>{{$i++}}</td>
                        <td>{{$arr[$j]->ten}}</td>
                        <td>....</td>
                        <td>{{$arr[$j]->soluong}}</td>
                        <td>{{$arr[$j]->cachdung}}</td>
                </tr>
                 @endfor
            </table>

           <br>
            <div class="foot" style="float: right">
                <CENTER>
                    <h4></h4>
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
    td{
        border-bottom: 1px dotted grey;
        border-right:1px solid black ;
    }
    #title{
        font-weight: bold;
    }
</style>
