{{-- Rapport Groups Index --}}
<?php

    if(session()->has('month')){
        $month = session('month');
    }
    $totalThisMonth = \App\Fiche::thisMonthGroups($month)->get();
    
    $totalValid = clone $totalThisMonth;
    $totalValid = $totalValid->where('valid_after_ecoute', 1);
    
    $totalAReporter = clone $totalThisMonth;
    $totalAReporter = $totalAReporter->where('status_id', 3);
    
    $totalnoValide = clone $totalThisMonth;
    $totalnoValide = $totalnoValide->where('no_valid_after_ecoute', 1);
    
    $totalnoDomicile = clone $totalThisMonth;
    $totalnoDomicile = $totalnoDomicile->where('l_rv', 1);

    // Domicile Semaine brut
    $totalDomicileSemaine = clone $totalThisMonth;
    $totalDomicileSemaine = $totalDomicileSemaine->where('l_rv', 4)->where('valid_after_ecoute', 1);
    
?>

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Rapport Groups</div>
                </div>
            </div>
            <div class="card-body">
                @include('app.rapports.agent.parts.selectMonth')
                @component('app.rapports.agent.parts.legend')
                    @slot('total', $totalThisMonth->count())
                    @slot('valide', $totalValid->count())
                    @slot('aReporter', $totalAReporter->count())
                    @slot('noValide', $totalnoValide->count())
                    @slot('domicile', $totalnoDomicile->count())
                    @slot('domicileSemaine', $totalDomicileSemaine->count())

                @endcomponent
                <div class="table-responsive">
                    <table class="table table-bordered dataTable table-hover table-responsive" id="data_table" style="width:100%; display: inline-table !important;">
                        <thead>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Aujourd'hui</th>
                            <th>Mois</th>
                            <th class="text-center"></th>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                           
                         <?php
                            
                            
                                $mesFichesToday =  \App\Fiche::fichesGroupToday($group->id)->get();
                                
                             
                                if (session()->has('month')) {
                                    $mesFichesThisMonth = \App\Fiche::thisMonthGroup($group->id, session('month'), session('year'))->get();
                                }
                                else {
                                    $mesFichesThisMonth = \App\Fiche::thisMonthGroup($group->id, $month, $year)->get();
                                    
                                }
                                //$myPourcentValid = round(($user->fichesThisMonthValidAfterEcoute->count() * 100)  / max($mesFichesThisMonth->count(), 1) );
                               // $myPourcentNoValid = round(($user->fichesThisMonthNoValidAfterEcoute->count() * 100)  / max($mesFichesThisMonth->count(), 1) );
                            
                        ?>
                            <tr>
                                <td style="vertical-align:middle;">{{$group->id}}</td>
                                <td style="vertical-align:middle;"> <a href="{{ url('rapports/group', $group->id) }}">{{$group->name}}</a></td>
                                <td style="vertical-align:middle;">
                                    @include('app.rapports.agent.parts.today')
                                </td>
                                <td style="vertical-align:middle;">
                                    @include('app.rapports.agent.parts.thisMonth')
                                </td>
                                <td style="vertical-align:middle;">
                                    <div class="row col-md-12">
                                        <span class="text-success  col-md-6">
                                            <i class="fa  fa-arrow-down "></i>
                                            0 %
                                        </span>
                                        <span class="text-danger col-md-6">
                                            <i class="fa fa-arrow-down "></i>
                                            0 %
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-date-picker.js') }}"></script>
@endsection