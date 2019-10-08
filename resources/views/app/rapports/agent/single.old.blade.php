{{-- Rapport Agent Single --}}
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Rapport {{$user->name}}</div>
                </div>
            </div>
            <div class="card-body">
                @include('app.rapports.agent.parts.selectMonth')
                    
                @component('app.rapports.agent.parts.legend')
                    @slot('total', $mesFiches->count())
                    @slot('valide', $mesFiches->where('valid_after_ecoute', 1)->count())
                    @slot('aReporter', $mesFiches->where('status_id', 3)->count())
                    @slot('noValide', $mesFiches->where('no_valid_after_ecoute')->count())
                    @slot('domicile', $mesFiches->where('l_rv', 1)->count())
                @endcomponent
                
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" style="width:100%; display: inline-table !important;">
                        <thead>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Aujourd'hui</th>
                            <th>Mois @if(session()->has('month')) ( {{session('month')}} ) @endif</th>
                            <th class="text-center"></th>
                        </thead>
                        <tbody>
                            <?php
                                $mesFichesToday = $user->mesFichesToday()->get();
                                if (session()->has('month')) {
                                    $mesFichesThisMonth = $user->mesFichesThisMonth(session('month'))->get();
                                }
                                else {
                                    $mesFichesThisMonth = $user->mesFichesThisMonth($month)->get();
                                }
                                $myPourcentValid = round(($user->fichesThisMonthValidAfterEcoute->count() * 100)  / max($mesFichesThisMonth->count(), 1) );
                                $myPourcentNoValid = round(($user->fichesThisMonthNoValidAfterEcoute->count() * 100)  / max($mesFichesThisMonth->count(), 1) );
                            ?>
                            <tr>
                                <td style="vertical-align:middle;">{{$user->id}}</td>
                                <td style="vertical-align:middle;"> <a href="{{ url('rapports/role/agent', $user->id) }}">{{$user->name}}</a></td>
                                <td style="vertical-align:middle;">
                                    @include('app.rapports.agent.parts.today')
                                </td>
                                <td style="vertical-align:middle;">
                                    @include('app.rapports.agent.parts.thisMonth')
                                </td>
                                <td style="vertical-align:middle;">
                                    <div class="row col-md-12">
                                        <span class="text-success  col-md-6">
                                            <i class="fa @if($myPourcentValid >= 50) fa-arrow-up @else fa-arrow-down @endif"></i>
                                            {{ $myPourcentValid }} %
                                        </span>
                                        <span class="text-danger col-md-6">
                                            <i class="fa @if($myPourcentNoValid >= 50) fa-arrow-up @else fa-arrow-down @endif"></i>
                                            {{ $myPourcentNoValid }} %
                                        </span>
                                    </div>
                                </td>
                            </tr>
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
    <script src="/backend/assets/vendor/data-tables/jquery.dataTables.min.js"></script>
    <script src="/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>
    <!--init datatable-->
    <script src="/backend/assets/vendor/js-init/init-datatable.js"></script>
    <script src="/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
    <script src="/backend/assets/vendor/js-init/pickers/init-date-picker.js"></script>
@endsection