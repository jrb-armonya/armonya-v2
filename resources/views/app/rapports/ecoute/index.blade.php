{{-- Rapport Ecoute Index --}}
<?php 
    $f = new App\Fiche;
    // Total fiche crées ce mois
    $createdMonth = $f->createdMonth(session()->has('month') ? session('month') : $month);
    // Total écouter ce mois
    $ecoutedMonth = $f->ecoutedMonth(session()->has('month') ? session('month') : $month)->get();
    $ecoutedMonthNoValid = $ecoutedMonth->filter(function($key, $val){
        return $key['no_valid_after_ecoute'] == 1;
    });

?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Rapport Ecoute</div>
                </div>
            </div>
            <div class="card-body">
                @include('app.rapports.agent.parts.selectMonth')
                <div class="status mb-3 mt-1">
                    <span class="badge badge-primary badge-nbr-rapport">Crée(s) mois - {{$createdMonth->count()}}</span>
                    <span class="badge badge-nbr-rapport" style="background-color: #{{ $role->color }}; color:white;">Ecoutée(s) mois - {{$ecoutedMonth->count()}}</span>
                    <span class="badge badge-success badge-nbr-rapport">Validée(s) Après écoute - {{ $ecoutedMonth->where('valid_after_ecoute', 1)->count() }}</span>
                    <span class="badge badge-danger badge-nbr-rapport">Non valide après écoute - {{ $ecoutedMonthNoValid->count() }}</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" style="width:100%; display: inline-table !important;">
                        <thead>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Ecoutée(s) jour</th>
                            <th>Ecoutée(s) mois</th>
                            <th class="text-center"></th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <?php 
                                
                                $mesEcoutedMonth = $user->ecoutedMonth(session()->has('month') ? session('month') : $month);
                                $mesEcoutedDay = $user->ecoutedMonth(session()->has('month') ? session('month') : $month)->whereDay('d_ecoute', date('d'));

                                

                            ?>
                            <tr>
                                <td style="vertical-align:middle;">{{$user->id}}</td>
                                <td style="vertical-align:middle;"> <a href="{{ url('rapports/role/ecoute', $user->id) }}">{{$user->name}}</a></td>
                                <td style="vertical-align:middle;">
                                    @include('app.rapports.ecoute.parts.day')
                                </td>
                                <td style="vertical-align:middle;">
                                    @include('app.rapports.ecoute.parts.month')
                                </td>
                                <td style="vertical-align:middle;">
                                    {{ $mesEcoutedMonth->count() * 100 / max($createdMonth->count(), 1) }} %
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
    <script src="/backend/assets/vendor/data-tables/jquery.dataTables.min.js"></script>
    <script src="/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>

    <!--date picker-->
    <script src="/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
    <!--init datatable-->
    <script src="/backend/assets/vendor/js-init/init-datatable.js"></script>
    <script src="/backend/assets/vendor/js-init/pickers/init-date-picker.js"></script>
@endsection