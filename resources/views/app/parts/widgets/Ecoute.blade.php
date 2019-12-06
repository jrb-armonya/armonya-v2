<?php 
    $fiche = new App\Fiche();
    $ecoutedMonth = $fiche->ecoutedMonth( date('m'), date('Y') );
    $ecoutedMonthValide = $fiche->ecoutedMonth( date('m'), date('Y') )->where('valid_after_ecoute', 1);
    $ecoutedMonthNonValide = $fiche->ecoutedMonth( date('m'), date('Y') )->where('no_valid_after_ecoute', 1);

    $myEcoute = $fiche->ecoutedMonth( date('m'), date('Y') )->where('ecoute_id', Auth::user()->id);
    $myEcouteValid = $fiche->ecoutedMonth( date('m'), date('Y') )->where('ecoute_id', Auth::user()->id)->where('valid_after_ecoute', 1);
    $myEcouteNonValid = $fiche->ecoutedMonth( date('m'), date('Y') )->where('ecoute_id', Auth::user()->id)->where('no_valid_after_ecoute', 1);

?>

{{-- My stats --}}
<div class="row col-12">
    <div class="col-xs-12 col-xl-4 col-md-4">
        <div class="card a-reporter mb-4" style="background-color:#b84592;">
            <div class="card-body">
                <div class="media d-flex align-items-center">
                    <div class="mr-4 rounded-circle bg-white sr-icon-box" style="color: #b84592;">
                        <i class="icon-earphones"></i>
                    </div>
                    <div class="media-body text-white">
                        <h4 class="text-uppercase mb-0 weight500">{{ $myEcoute->whereDate('d_ecoute', \Carbon\Carbon::today())->count() }} / Jour</h4>
                        <span>Total mois: {{ $myEcoute->count() }}</span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-xl-4 col-md-4">
        <div class="card a-reporter mb-4 bg-success">
            <div class="card-body">
                <div class="media d-flex align-items-center">
                    <div class="mr-4 rounded-circle bg-white sr-icon-box text-success">
                        <i class="ti-thumb-up"></i>
                    </div>
                    <div class="media-body text-white">
                        <h4 class="text-uppercase mb-0 weight500">{{ $myEcouteValid->whereDate('d_ecoute', \Carbon\Carbon::today())->count() }} / jour</h4>
                        <span>Valides mois: {{ $myEcouteValid->count() }}</span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-xl-4 col-md-4">
        <div class="card a-reporter mb-4 bg-danger">
            <div class="card-body">
                <div class="media d-flex align-items-center">
                    <div class="mr-4 rounded-circle bg-white sr-icon-box text-danger">
                        <i class="ti-thumb-down"></i>
                    </div>
                    <div class="media-body text-white">
                        <h4 class="text-uppercase mb-0 weight500">{{ $myEcouteNonValid->whereDate('d_ecoute', \Carbon\Carbon::today())->count() }} / jour</h4>
                        <span>Non Valides mois: {{ $myEcouteNonValid->count() }}</span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Team Stats --}}
<div class="row col-12">
    <div class="col-xs-12 col-xl-4 col-md-4">
        <div class="card mb-4">
            <div class="card-body card-widget">
                <div class="media d-flex align-items-center ">
                    <div class="mr-4 rounded-circle bg-white sr-icon-box" style="color: #b84592;">
                        <i class="icon-earphones"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">Total Equipe</h4>
                        <span>{{ $ecoutedMonth->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-xl-4 col-md-4">
        <div class="card mb-4">
            <div class="card-body card-widget">
                <div class="media d-flex align-items-center ">
                    <div class="mr-4 rounded-circle bg-white sr-icon-box text-success">
                        <i class="ti-thumb-up"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">Valide Equipe</h4>
                        <span>{{ $ecoutedMonthValide->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-xl-4 col-md-4">
        <div class="card mb-4">
            <div class="card-body card-widget">
                <div class="media d-flex align-items-center ">
                    <div class="mr-4 rounded-circle bg-white sr-icon-box text-danger">
                        <i class="ti-thumb-down"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">Non Valide Equipe</h4>
                        <span>{{ $ecoutedMonthNonValide->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>