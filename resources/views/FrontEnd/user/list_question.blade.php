@if(isset($questions))
@foreach($questions as $q)
    <div class="col-md-10"><h4>{{$q->question}}</h4></div>
    <div class="col-md-10">
        <textarea name="question"  cols="70" rows="1" required="required"></textarea>
    </div>
    @endforeach
@endif