@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-shadow mb-4">

        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title">Factures éditées</div>
                <div class=" widget-action-link">
                    <div class="dropdown">
                        <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown" aria-expanded="false">
                            <i class="vl_ellipsis-fill-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right vl-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(16px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                            {{-- <a class="dropdown-item" href="/configuration/roles"><i class="fa fa-users"></i> &nbsp Roles</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Partenaire</th>
                            <th>Status</th>
                            <th>Montant</th>
                            <th>Création</th>
                            <th>action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($factures as $facture)
                            <tr>
                                <td>{{$facture->id}}</td>
                                <td><span style="color: black;">{{$facture->partenaire->name}}</span></td>
                                @if($facture->status == "vide")
                                    <td class="badge badge-status" style="color: white; background-color: #06c8c3;"> {{$facture->status}}</td>
                                @elseif($facture->status == "En Attente")
                                    <td class="badge badge-status" style="color: white; background-color: #9b9b00;"> {{$facture->status}}</td>
                                @endif
                                <td>{{ $facture->amount()}} €</td>
                                <td>{{$facture->created_at->format('d/m/y')}}</td>
                                <td>
                                    <a href="{{ route('factures.show', $facture->id) }}"><i class="ti-search btn-open-fiche"></i></a>
                                    <a href="{{ route('factures.show', $facture->id) }}" data-toggle="modal" data-target="#facture-delete" data-whatever="@mdo"><i class="ti-trash btn-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('app.factures.modals.confirm-delete')
@endsection

@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>

@endsection