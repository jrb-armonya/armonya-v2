{{-- Rapport Ecoute Index --}}
<?php 
    // dd($day);
    $f = new App\Fiche;
    // $reportMonth: c'est les fiches avec date Rappel ce mois.
    $reportMonth = $f->reportMonth(session()->has('month') ? session('month') : $month);
    $reportedMonth = $f->reportedMonth(session()->has('month') ? session('month') : $month);
?>
@extends('layouts.app')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--select2-->
    <link href="{{ asset('/backend/assets/vendor/select2/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/datetime-picker/css/datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/timepicker/css/timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title">Rapport Report</div>
                </div>
            </div>
            <div class="card-body">
                @include('app.rapports.agent.parts.selectMonth')
                <div class="status mb-3 mt-1">
                    <span class="badge badge-primary badge-nbr-rapport">Rappels {{ $reportMonth->count() }}</span>
                    <span class="badge badge-nbr-rapport" style="background-color: #{{ $role->color }}; color:white;">Traitées(s) - {{$reportedMonth->count()}}</span>
                </div>

                   
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" style="width:100%; display: inline-table !important;">
                        <thead>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Traités</th>
                            {{-- <th>Brut</th> --}}
                            <th>Pris</th>
                            <th>Confirmée</th>
                            <th>Envoyées</th>
                            <th>%</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @php
                                // traité month
                                $trait = $user->reportedMonth(session()->has('month') ? session('month') : $month)->count();
                                
                                // traité Day
                                $traitDay = $user->reportedDay(
                                    session()->has('day') ? session('d') : $day,
                                    session()->has('month') ? session('month') : $month,
                                    session()->has('year') ? session('year') : $year
                                    )
                                    ->count();


                                $pris = $user->reports()
                                    ->whereMonth('created_at', session()->has('month') ? session('month') : $month)
                                    ->whereHas('fiche', function($q){
                                        $q->whereNotIn('status_id', Config::get('status.noValid'));
                                    })->count();

                                $prisDay = $user->reports()
                                    ->whereDay('created_at', session()->has('day') ? session('day') : $day)
                                    ->whereMonth('created_at', session()->has('month') ? session('month') : $month)
                                    ->whereYear('created_at', session()->has('year') ? session('year') : $year)
                                    ->whereHas('fiche', function($q){
                                        $q->whereNotIn('status_id', Config::get('status.noValid'));
                                    })->count();

                                $conf = $user->reports()
                                    ->whereIn('state', [1,2])
                                    ->whereMonth('updated_at', session()->has('month') ? session('month') : $month)
                                    ->whereYear('updated_at', session()->has('year') ? session('year') : $year)
                                    ->count();

                                $confDay = $user->reports()
                                    ->whereIn('state', [1,2])
                                    ->whereDay('created_at', session()->has('day') ? session('day') : $day)
                                    ->whereMonth('created_at', session()->has('month') ? session('month') : $month)
                                    ->whereYear('created_at', session()->has('year') ? session('year') : $year)
                                    ->count();
 
                                $env = $user->reports()
                                    ->where('state', 2)
                                    ->whereMonth('updated_at', session()->has('month') ? session('month') : $month)
                                    ->whereYear('updated_at', session()->has('year') ? session('year') : $year)->count();
                                
                                $envDay = $user->reports()
                                    ->where('state', 2)
                                    ->whereDay('created_at', session()->has('day') ? session('day') : $day)
                                    ->whereMonth('created_at', session()->has('month') ? session('month') : $month)
                                    ->whereYear('created_at', session()->has('year') ? session('year') : $year)
                                    ->count();
                                    
                            @endphp
                            <tr>
                                {{-- user_id --}}
                                <td style="vertical-align:middle;">{{$user->id}}</td>
                                {{-- user name --}}
                                <td style="vertical-align:middle;"><a href="{{ url('rapports/user', [$user->id, 7, session()->has('month') ? session('month') : $month, date('Y')]) }}">{{$user->name}}</a></td>
                                {{-- Traité --}}
                                <td style="vertical-align:middle;"> 
                                    <a href="{{url('rapports/user/details/report', [$user->id, 'trait', session()->has('month') ? session('month') : $month])}}">{{$traitDay}} / {{ $trait }}</a>
                                </td>
                                {{-- pris --}}
                                <td style="vertical-align:middle;"> 
                                    <a href="{{url('rapports/user/details/report', [$user->id, 'pris', session()->has('month') ? session('month') : $month])}}">{{$prisDay}} / {{ $pris }}</a>
                                </td>
                                {{-- confirmées --}}
                                <td style="vertical-align:middle;">
                                    <a href="
                                    {{
                                        url('rapports/user/details/report', [ 
                                            $user->id, 'conf', session()->has('month') ? session('month') : $month,
                                            session()->has('year') ? session('year') : $year
                                            ])
                                    }}">
                                    {{$confDay}} / {{ $conf }}
                                    </a>
                                </td>
                                {{-- envoyées --}}
                                <td style="vertical-align:middle;">
                                    <a href="{{url('rapports/user/details/report', [
                                        $user->id, 'env', session()->has('month') ? session('month') : $month,
                                        session()->has('year') ? session('year') : $year,
                                    ])}}">{{$envDay}} / {{ $env }}</a>
                                </td>
                                <td style="vertical-align:middle;">
                                    {{ round($env * 100 / max($trait, 1), 2) }} %
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-muted">Pourcentage: Envoyées * 100 / Traitées </p>
                <p class="text-muted">Les fiches envoyés: c'est les fiches qui sont envoyées à un Partenaire (date d'envoi > date de report) 
                     et qui sont dans les status suivant (Attente CR - Contrôle Qualitée - Ciblée) </p>
            </div>
        </div>
    </div>
</div>


@endsection

@section('javascript')
    <script src="{{asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/js-init/pickers/init-date-picker.js') }}"></script>
@endsection