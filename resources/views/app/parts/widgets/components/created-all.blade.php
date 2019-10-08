<div class="col-xl-3 col-md-3">
    <div class="card bg-info text-white mb-4 py-1">
        <div class="card-body card-widget">
            <div class="float-right">
                <i class="icon-note fa-3x text-white"></i>
            </div>
            <h5 class="font-weight-bold mt-0" title="Number of Orders">Créee(s)</h5>
            <h4 class="mt-3 mb-3 text-white">{{$day}} / jour</h4>
            <h4 class="mt-3 mb-3 text-white">{{$month}} / mois</h4>
            <p class="mb-0 ">
                <span class=" mr-2">Non agent {{ $moisOthers }}</span>
                <span class="float-right"><a href="{{ url($link) }}" style="color: white;">Voir </a></span>
            </p>
        </div>
    </div>
</div>