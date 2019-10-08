{{-- 
    
    
    --}}
<?php 
    $f = new App\Fiche();
    //traité: fiches date_reports this month
    $myTraited = Auth::user()->reportedMonth(date('m'))->count();
    //rdv_ok: fiches date_reports this month and valid_after_ecoute
    $rdv_ok = Auth::user()->reportedMonth(date('m'))->where('valid_after_ecoute', 1)->count();

    // confirmer: fiches date_reports this month and date_confirm != null
    $reportConfirmed = Auth::user()->reportedMonth(date('m'))->where('valid_after_ecoute', 1)->where('d_confirm', '!=', null)->whereNotIn('status_id', \Config('status.noValid'))->count();

?>
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

<div class="col-xl-3 col-sm-3">
    <div class="card a-reporter mb-4" style="background-color:#ffa604;">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box" style="color: #ffa604;">
                    <i class="icon-calendar"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{$rdv_ok}}</h4>
                    <span>RDV OK</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-sm-3">
    <div class="card confirm mb-4" style="background-color:#22ae7a;">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box" style="color: #22ae7a;">
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

<div class="col-xl-3 col-sm-3">
    <div class="card confirm mb-4 bg-primary">
        <div class="card-body">
            <div class="media d-flex align-items-center">
                <div class="mr-4 rounded-circle bg-white sr-icon-box text-primary">
                    <i class="mdi mdi-chart-bar"></i>
                </div>
                <div class="media-body text-white">
                    <h4 class="text-uppercase mb-0 weight500">{{ round( $reportConfirmed * 100 / max($myTraited, 1) )  }} %</h4>
                    <span>Qualité</span>
                </div>
            </div>
        </div>
    </div>
</div>