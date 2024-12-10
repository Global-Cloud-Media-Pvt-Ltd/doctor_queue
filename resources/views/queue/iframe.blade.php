@foreach($Iframes as $Iframe)
<div class="col-md-11">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{{$Iframe->iframe}}" allowfullscreen></iframe>
    </div>
</div>
@endforeach