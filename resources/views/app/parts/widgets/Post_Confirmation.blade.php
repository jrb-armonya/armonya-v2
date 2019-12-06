<div class="col-xl-6 col-md-6">
    <div class="card text-white mb-4 py-1 bg-primary">
        <div class="card-body card-widget">
            <div class="float-right">
                <i class="icon-note  fa-3x text-white"></i>
            </div>
            <h5 class="font-weight-bold mt-0" title="Number of Orders">RDV {{date('d/m/Y')}}</h5>
            <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesForTomorrow']->count() }} pour demain</h4>
            <h4 class="mt-3 mb-3 te xt-white">{{ $fiches['fichesForThisMonth']->count() }} pour ce mois</h4>
            <p class="mb-0 ">
                <span class=" mr-2">--</span>
                <span class="float-right"><a href="" style="color: white;">Voir </a></span>
            </p>
        </div>
    </div>
</div>
<div class="col-xl-6 col-md-6">
    <div class="card text-white mb-4 py-1 bg-success">
        <div class="card-body card-widget">
            <div class="float-right">
                <i class="icon-check  fa-3x text-white"></i>
            </div>
            <h5 class="font-weight-bold mt-0" title="Number of Orders">RDV Confirmé(s)</h5>
            <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesConfirmedToday']->count() }} aujourd'hui</h4>
            <h4 class="mt-3 mb-3 te xt-white">{{ $fiches['fichesConfirmedThisMonth']->count() }} ce mois</h4>
            <p class="mb-0 ">
                <span class=" mr-2">{{($fiches['fichesConfirmedToday']->count() * 100) / max(1, $fiches['fichesForTomorrow']->count())}} aujourd'hui <small>(Confirmés *100) / RDV pour aujourd'hui</small></span>
                <span class="float-right"><a href="{{ url('fiches/post-conf/confirmed') }}" style="color: white;">Voir </a></span>
            </p>
        </div>
    </div>
</div>

<div class="col-xl-6 col-md-6">
    <div class="card text-white mb-4 py-1" style="background-color:#766df9;">
        <div class="card-body card-widget">
            <div class="float-right">
                <i class="ti-location-arrow  fa-3x text-white"></i>
            </div>
            <h5 class="font-weight-bold mt-0" title="Number of Orders">Envoyé(s)</h5>
            <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesSendToday']->count() }} aujourd'hui</h4>
            <h4 class="mt-3 mb-3 te xt-white">{{ $fiches['fichesSendMonth']->count() }} ce mois</h4>
            <p class="mb-0 ">
                <span class=" mr-2">--</small></span>
                <span class="float-right"><a href="" style="color: white;">Voir </a></span>
            </p>
        </div>
    </div>
</div>
@section("{{ Auth::user()->role->name }}")
@endsection 