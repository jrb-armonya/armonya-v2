<div class="col-xl-3 col-md-3 mb-2">
    <div class="card {{$class}} text-white mb-2 py-1" style="background-color:#{{$bgcolor}};">
        <div class="card-body card-widget">
            <div class="float-right">
                <i class="{{$icon}} fa-3x text-white"></i>
            </div>
            <h5 class="font-weight-bold mt-0" title="Widget">{{$title}}</h5>
            <h4 class="mt-3 mb-3 text-white">{{$day}} / jour</h4>
            <h4 class="mt-3 mb-3 text-white">{{$month}} / mois</h4>
            <p class="mb-0">
                <span class="mr-2">{{$text}}</span>
                <span class="float-right"><a href="{{url($link)}}" style="color: white;">Voir</a> </span>
            </p>
        </div>
    </div>
</div>