{{-- Rapport Synthese Index --}}

@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-6">

            <div class="card card-shadow mb-4">

                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title"> 
                            <h5>
                                Synthese du {{ date('d/m/Y') }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding-bottom: 0;">
                    
                    {{-- Created --}}
                    <div class="row">

                        <div class='card card-rapports-roles mb-4 col-md-6 bg-primary'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-note"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['createdByAgents'] }}</h4>
                                        <span>Création</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles mb-4 col-md-3 bg-primary'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['domicile'] }}</h4>
                                        <span>Domicile</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles mb-4 col-md-3 bg-primary'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['domicileSemaine'] }}</h4>
                                        <span>Semaine</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Ecoute --}}
                    <div class="row">

                        <div class='card card-rapports-roles col-md-4 mb-4' style="background-color:#b84592;">
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="fa fa-headphones"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['ecouted'] }}</h4>
                                        <span>Ecoute</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles col-md-4 mb-4 bg-success'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="ti-thumb-up  fa-3x"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['ecoutedValid'] }}</h4>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles col-md-4 mb-4 bg-danger'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="ti-thumb-down fa-3x "></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['ecoutedNoValid'] }}</h4>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Confirmed --}}
                    <div class="row">
                        <div class='card card-rapports-roles col-md-12 mb-4' style="background-color:#22ae7a;">
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-check"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['confirmed'] }}</h4>
                                        <span>Confirmées</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Report --}}
                    <div class="row">

                        <div class='card card-rapports-roles col-md-9 mb-4 bg-warning'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-calendar"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['reported'] }}</h4>
                                        <span>Traitées</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles col-md-3 mb-4 bg-warning'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-calendar"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['reportCreated'] }}</h4>
                                        <span>Créés</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sended --}}
                    <div class="row">
                        <div class='card card-rapports-roles col-md-12 mb-4' style="background-color:#766df9;">
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="ti-location-arrow"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['sended'] }}</h4>
                                        <span>Envoyées</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>

        <div class="col-md-6">
            <div class="card card-shadow mb-4">

                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title"> 
                            <h5>
                                Rendez-vous du {{ \Carbon\Carbon::tomorrow()->format('d/m/Y') }}
                            </h5>   
                        </div>
                    </div>
                </div>

               <div class="card-body" style="padding-bottom: 0;">

                    {{-- Rdv pour demain --}}
                    <div class="row">
                        <div class='card card-rapports-roles mb-4 col-md-6 bg-primary'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-note"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['rdv_demain'] }}</h4>
                                        <span>Redendez-vous pour demain</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card card-rapports-roles mb-4 col-md-6 bg-primary'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-note"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['aConfDemain'] }}</h4>
                                        <span>A Confirmer pour demain</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PI, HC, NRP --}}
                    <div class="row">
                        <div class='card card-rapports-roles mb-4 col-md-4 bg-danger'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-close"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['piDemain'] }}</h4>
                                        <span>PI</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles mb-4 col-md-4 bg-danger'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-note"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['hcDemain'] }}</h4>
                                        <span>HC</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='card card-rapports-roles mb-4 col-md-4 bg-danger'>
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-note"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['nrpDemain'] }}</h4>
                                        <span>NRP</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- A Reporter --}}
                    <div class="row">
                        <div class="card card-rapports-roles mb-4 col-md-12 bg-warning">
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-calendar"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['reportDemain'] }}</h4>
                                        <span>A Reporter</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Confimée --}}
                    <div class="row">
                        <div class="card card-rapports-roles mb-4 col-md-12 bg-success">
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        <i class="icon-check"></i>
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 weight500">{{ $synthese['confDemain'] }}</h4>
                                        <span>Confirmées</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pourcentage --}}
                    <div class="row">
                        <div class="card card-rapports-roles mb-4 col-md-12 bg-success">
                            <div class="card-body">
                                <div class="media d-flex align-items-center">
                                    <div class="mr-4 rounded-circle sr-icon-box text-white">
                                        {{-- <i class="icon-note"></i> --}}
                                    </div>
                                    <div class="media-body text-light">
                                        <h4 class="text-uppercase mb-0 text-center" style="font-size: 32px;">{{ $synthese['pourcentageDemain'] }} %</h4>
                                        {{-- <span>%</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="car-footer">
                    <p class="text-muted m-1">
                        <b>Pourcentage:</b> (conf pour demain * 100) / rdv de demain
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection