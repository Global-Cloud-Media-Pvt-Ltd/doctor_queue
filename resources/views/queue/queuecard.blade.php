@foreach ($queues as $queue)
<div class="card ml-2 mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 text-center" style=" color: #009688;  font-size: 25px">
                <b>{{$queue->room_no}}</b>
            </div>
            <div class="col-md-12 text-center" style=" color: red; font-size: 25px">
                <b>{{$queue->doctor_name}}</b>
            </div>
            <div class="col-md-12 text-center" style=" color: orange; font-size: 25px">
                <b>{{$queue->doctor_special}}</b>
            </div>
        </div>
    </div>
</div>
@endforeach