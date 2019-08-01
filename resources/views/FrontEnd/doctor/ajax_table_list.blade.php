<?php $i = 1; ?>
@if(isset($nodes))
    @foreach($nodes as $node)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$node->user_id}}</td>
            <td>{{ $node->user()->first()->name}}</td>
            <td>{{ $node->user()->first()->phone}}</td>
            <td>{{ $node->user()->first()->address}}</td>
            <td>{{$node->status}}</td>
            <td>
                <form action="{{route('doctor.popPatient')}}" method="get">

                    <input type="text" name = "user_id" style="display: none" value="{{$node->user_id}}">
                    <button  type="submit"><i class="material-icons">
                            assignment
                        </i></button>
                </form>
            </td>
            @if ($node->status==0)
                <td><button id="disable">Disable</button></td>
            @endif
            @if ($node->status==1)
                <td><button id="succes">Succes</button></td>
            @endif
        </tr>

    @endforeach
@endif