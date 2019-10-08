<div class="row col-md-12">
    <div class="col-xl-4 col-md-4">
        <div class="card bg-info text-white mb-4 py-1">
            <div class="card-body card-widget">
                <div class="float-right">
                    <i class="icon-note fa-3x text-white"></i>
                </div>
                <h5 class="font-weight-bold mt-0" title="Number of Orders">Créee(s)</h5>
                <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesAgentsDay']->count() }} / jour</h4>
                <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesAgents']->count() }} / mois</h4>
                <p class="mb-0 ">
                    <span class=" mr-2">--</span>
                    <span class="float-right"><a href="{{ url('fiches/plateau') }}" style="color: white;">Voir </a></span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-success text-white mb-4 py-1">
            <div class="card-body card-widget">
                <div class="float-right">
                    <i class="ti-thumb-up  fa-3x text-white"></i>
                </div>
                <h5 class="font-weight-bold mt-0" title="Number of Orders">Validée(s)</h5>
                <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesValidDay']->count() }}  / jour</h4>
                <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesValidMonth']->count() }}  / mois</h4>
                <p class="mb-0 ">
                    <span class=" mr-2">--</span>
                    <span class="float-right"><a href="{{ url('fiches/plateau/valid') }}" style="color: white;">Voir </a></span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-danger text-white mb-4 py-1">
            <div class="card-body card-widget">
                <div class="float-right">
                    <i class="ti-thumb-down fa-3x text-white"></i>
                </div>
                <h5 class="font-weight-bold mt-0" title="Number of Orders">Non Validée(s)</h5>
                <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesNoValidDay']->count() }} / jour</h4>
                <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesNoValidMonth']->count() }} / mois</h4>
                <p class="mb-0 ">
                    <span class=" mr-2">--</span>
                    <span class="float-right"><a href="{{ url('fiches/plateau/no-valid') }}" style="color: white;">Voir </a></span>
                </p>
            </div>
        </div>
    </div>

    
</div>

<div class="row col-md-12">
        {{-- DOmicile --}}
        <div class="col-xl-6 col-md-6">
            <div class="card text-white mb-4 py-1" style="background-color:#0000ffb0;">
                <div class="card-body card-widget">
                    <div class="float-right">
                        <i class="fa fa-building-o fa-3x text-white"></i>
                    </div>
                    <h5 class="font-weight-bold mt-0" title="Number of Orders">Domicile</h5>
                    <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesDomicileJour']->count() }} / jour</h4>
                    <h4 class="mt-3 mb-3 te xt-white">{{ $fiches['fichesDomicileMois']->count() }} / mois</h4>
                    <p class="mb-0 ">
                        <span class=" mr-2">--</span>
                        <span class="float-right"><a href="{{ url('fiches/plateau/no-valid') }}" style="color: white;">Voir </a></span>
                    </p>
                </div>
            </div>
        </div>
        {{-- Domicile Semaine --}}
        <div class="col-xl-6 col-md-6">
            <div class="card text-white mb-4 py-1" style="background-color:#0000ffb0;">
                <div class="card-body card-widget">
                    <div class="float-right">
                        <i class="fa fa-building-o fa-3x text-white"></i>
                    </div>
                    <h5 class="font-weight-bold mt-0" title="Number of Orders">Domicile Semaine</h5>
                    <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesDomicileSemaineJour']->count() }} / jour</h4>
                    <h4 class="mt-3 mb-3 text-white">{{ $fiches['fichesDomicileSemaineMois']->count() }} / mois</h4>
                    <p class="mb-0 ">
                        <span class=" mr-2">--</span>
                        <span class="float-right"><a href="{{ url('fiches/plateau/no-valid') }}" style="color: white;">Voir </a></span>
                    </p>
                </div>
            </div>
        </div>
</div>



@foreach($widgets as $w)
    <?php $path = "app.parts.widgets.components." . $w->name; ?>
        @component($path)
            @slot('status', $status)
        @endcomponent
@endforeach

@include('app.parts.widgets.components.week-production')
@section("{{ Auth::user()->role->name }}")
    <script src="{{ asset('/backend/assets/vendor/js-init/chartjs/init-week-production.js') }}"></script>
@endsection 