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
                
                
                <div class="table-responsive ">
                    <table class="table table-bordered  dataTable table-hover table-responsive"
style="width:100%; display: inline-table !important;"
                     id="data_table">
                        <thead>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Date Rendez-vous</th>
                            <th>Lieux rendez-vous</th>
                            <th>Après Ecoute</th>
                            <th>Status</th>
                            <th class="text-center">#</th>
                        </thead>
                        <tbody>
                            @foreach($mesFiches->get() as $fiche)
                                <tr>
                                    <td>{{$fiche->id}}</td>
                                    <td>{{$fiche->name}} {{$fiche->prenom}}</td>
                                    <td>{{$fiche->d_rv->format('d/m/Y')}}</td>
                                    <td>
                                        @if($fiche->l_rv == 1)
                                            Domicile
                                        @elseif($fiche->l_rv ==2 )
                                            Bureau
                                        @elseif($fiche->l_rv ==3 )
                                            Cabinet
                                        @endif
                                    </td>
                                    <td>
                                        @if($fiche->valid_after_ecoute == 1)
                                            <i class="fa fa-circle-o" style="color: green;"></i>
                                        @elseif($fiche->no_valid_after_ecoute == 1)
                                            <i class="fa fa-circle-o" style="color: red;"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-status"
                                            style="background-color:#{{$fiche->status->color}};">
                                            {{$fiche->status->name}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/historique/fiche/{{$fiche->id}}"  target="_blank">
                                            <i class="ti-direction-alt btn-historic"></i>
                                        </a>
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
    <script src="{{asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>
    <!--init datatable-->
    <script src="{{asset('/backend/assets/vendor/js-init/init-datatable.js')}}"></script>
    <script src="{{asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/backend/assets/vendor/js-init/pickers/init-date-picker.js')}}"></script>
@endsection