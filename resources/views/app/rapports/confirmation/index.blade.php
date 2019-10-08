{{-- Rapport Agent Index --}}
<?php 
    $f = new App\Fiche;

    if(session()->has('month')){
        $rdvMonth = $f->rdvMonth( session('month'), session('year') );
        $confirmedMonth = $f->confirmedMonth( session('month'), session('year') );
    } else {
        $rdvMonth = $f->rdvMonth($month, $year);
        $confirmedMonth = $f->confirmedMonth($month, $year);
    }
    // $rdvMonth = $f->rdvMonth(session()->has('month') ? session('month') : $month);
    // $confirmedMonth = $f->confirmedMonth(session()->has('month') ? session('month') : $month);
?>
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Rapport Confirmation </div>
                </div>
            </div>
            <div class="card-body">
                @include('app.rapports.agent.parts.selectMonth')
                <div class="status mb-3 mt-1">
                        <span class="badge badge-primary badge-nbr-rapport">Rendez-vous pour ce mois - {{ $rdvMonth->count() }}</span>
                        <span class="badge badge-success badge-nbr-rapport">Confirmation ce mois - {{$confirmedMonth->count()}}</span>
                        <span class="badge badge-danger badge-nbr-rapport">Pourcentage confirmation - {{ round($confirmedMonth->count() * 100 / max($rdvMonth->count(), 1)) }} %</span>
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" style="width:100%; display: inline-table !important;">
                        <thead>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Confirmée(s) jour</th>
                            <th>Confirmée(s) mois</th>
                            <th class="text-center"></th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <?php 
                                    $mesConfirmedToday = $user->confirmedToday()->count();
                                    $mesConfirmedMonth = $user->confirmedMonth(session()->has('month') ? session('month') : $month)->count();

                                ?>
                                <tr>
                                    <td style="vertical-align:middle;">{{$user->id}}</td>
                                    <td style="vertical-align:middle;"> <a href="{{ url('rapports/role/confirmation', $user->id ) }}">{{$user->name}}</a></td>
                                    <td style="vertical-align:middle;">
                                        {{ $mesConfirmedToday }}
                                    </td>
                                    <td style="vertical-align:middle;">
                                        {{ $mesConfirmedMonth }}
                                    </td>
                                    <td style="vertical-align:middle;">
                                        {{ round($mesConfirmedMonth * 100  / max($rdvMonth->count(), 1)) }} %
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