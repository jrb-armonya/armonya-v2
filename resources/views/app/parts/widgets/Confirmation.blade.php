<?php 
    $f = new App\Fiche;
    $rdvMonth = $f->rdvMonth($month, '2019')->count();
    $confirmedTeam = $f->confirmedMonth($month, '2019')->count();
    $myConfirmed = Auth::user()->confirmedMonth($month)->count();
?>
<div class="col-xl-6 col-sm-6">
    <div class="card mb-4 bg-primary">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white  sr-icon-box text-primary">
                    <i class="icon-check"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{ $myConfirmed }}</h4>
                    <span>Mes confirmations ( {{ round($myConfirmed * 100 / max($rdvMonth, 1)) }} % )</span>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="col-xl-6 col-sm-6">
    <div class="card mb-4 bg-success">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box text-success">
                    <i class="icon-target"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{Auth::user()->confimedCibled($month)->count()}}</h4>
                    <span>Mes Ciblées</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-6 col-sm-6">
    <div class="card mb-4">
        <div class="card-body card-widget">
            <div class="media d-flex align-items-center ">
                <div class="mr-4 rounded-circle bg-white sr-icon-box text-info">
                    <i class="vl_graph-bar"></i>
                </div>
                <div class="media-body">
                    <h4 class="text-uppercase mb-0 weight500">Rendez-vous pour ce mois</h4>
                    <span>{{ $rdvMonth }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-sm-6">
    <div class="card mb-4">
        <div class="card-body card-widget">
            <div class="media d-flex align-items-center ">
                <div class="mr-4 rounded-circle bg-white sr-icon-box text-success">
                    <i class="ti-thumb-up"></i>
                </div>
                <div class="media-body">
                    <h4 class="text-uppercase mb-0 weight500">Equipe </h4>
                    <span>{{ $confirmedTeam }}</span>
                </div>
            </div>
        </div>
    </div>
</div>