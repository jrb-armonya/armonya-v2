<?php 
    $myTraited = Auth::user()->reports()
        ->whereMonth('created_at', date('m'))
        ->count();

    $rdv_ok = Auth::user()->reportedMonth(date('m'))->where('valid_after_ecoute', 1)->count();

    $reportConfirmed = Auth::user()->reports()
        ->whereIn('state', [1,2])
        ->whereMonth('updated_at', date('m'))
        ->whereYear('updated_at', date('Y'))->count();

    $reportEnv = Auth::user()->reports()
        ->where('state', 2)
        ->whereMonth('updated_at', date('m'))
        ->whereYear('updated_at', date('Y'))->count();

?>
{{-- Reports Traités --}}
<div class="col-xl-3 col-sm-3">
    <div class="card a-reporter mb-4" style="background-color:#ffa604;">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box" style="color: #ffa604;">
                    <i class="icon-calendar"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{ $myTraited }}</h4>
                    <span>Traitées</span>
                </div> 
            </div>
        </div>
    </div>
</div>

{{-- Reports Confirmés --}}
<div class="col-xl-3 col-sm-3">
    <div class="card confirm mb-4 bg-primary">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box text-primary">
                    <i class="icon-check"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{ $reportConfirmed }}</h4>
                    <span>Confirmées</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Reports Envoyés --}}
<div class="col-xl-3 col-sm-3">
    <div class="card a-reporter mb-4" style="background-color: #766df9 !important;">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box" style="color: #766df9;">
                    <i class="ti-location-arrow"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{$reportEnv}}</h4>
                    <span>Envoyés</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Qualtié % --}}
<div class="col-xl-3 col-sm-3">
    <div class="card confirm mb-4" style="background-color:#22ae7a;">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box text-success">
                    <i class="ti-pie-chart"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{ round( $reportEnv * 100 / max($myTraited, 1) )  }} %</h4>
                    <span>Qualité</span>
                </div>
            </div>
        </div>
    </div>
</div>
