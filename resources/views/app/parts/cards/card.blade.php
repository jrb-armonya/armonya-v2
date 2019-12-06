<div class="card {{$class}} card-shadow mb-4">
    <div class="card-header border-0">
        <div class="custom-title-wrap bar-info">
            <div class="custom-title"><h4>{{$title}} <small class="text-muted">{{$desc}}</small></h4></div>
        </div>
    </div>
    <div class="card-body">
        {{$slot}}
    </div>
</div>