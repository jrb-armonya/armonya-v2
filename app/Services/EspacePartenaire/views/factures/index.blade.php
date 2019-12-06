@extends('espace-partenaire::layouts.espace-partenaire')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-inline-block ">
    <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="{{url('/espace-partenaire')}}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="icon-fontawesome.html#">Sécurité</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Mes factures</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                Mes factures
            </div>
        </div>
        <div class="card-body">
            <p>
                Liste de vos factures
            </p>
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
                                @elseif($facture->status == "Envoyée")
                                    <td class="badge badge-status" style="color: white; background-color: #9b9b00;"> {{$facture->status}}</td>
                                @endif
                                <td>{{ $facture->amount()}} €</td>
                                <td>{{$facture->created_at->format('d/m/y')}}</td>
                                <td>
                                    <a href="{{ url('/espace-partenaire/factures/show', $facture->id) }}"><i class="ti-search btn-open-fiche"></i></a>
                                    {{-- <a href="{{ route('factures.show', $facture->id) }}" data-toggle="modal" data-target="#facture-delete" data-whatever="@mdo"><i class="ti-trash btn-remove"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>

@endsection