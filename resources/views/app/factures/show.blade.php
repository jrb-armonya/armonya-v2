@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-shadow mb-4">
            <div class="card-body">
                <div class="media d-flex align-items-center">
                    <div class="mr-4 rounded-circle bg-success sr-icon-box ">
                        <i class="icon-docs"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">{{ $facture->partenaire->prix_fiche }} €</h4>
                        <span class="text-muted">Prix de la fiche <small>(<a href="{{ url('/configuration/partenaires', $facture->partenaire_id) }}">modifier</a>)</small></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-shadow mb-4">
            <div class="card-body">
                <div class="media d-flex align-items-center ">
                    <div class="mr-4 rounded-circle bg-warning sr-icon-box ">
                        <i class="icon-credit-card"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">{{ $facture->fiches->count() * $facture->partenaire->prix_fiche }} €</h4>
                        <span class="text-muted">Prix de la facture</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12">
    <div class="card card-shadow mb-4">

        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>{{$title}} #{{$facture->id}} <small class="text-muted"><b>{{$partenaire->name}}</b></small></h4></div>
            </div>
        </div>

        <div class="card-body">
            <div class="row col-12">
                @include('app.factures.parts.list-fiches-partenaire')
                @include('app.factures.parts.list-fiches-facture')
                   <a href="{{ url( '/facturation/factures/generer', $facture->id ) }}" class="col-md-12"><button class="btn btn-success col-md-12" @if($facture->fiches->count() == 0) disabled @endif>Générer</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <!--init datatable-->
    <script src="{{asset('/backend/assets/vendor/js-init/init-datatable.js')}}"></script>
@endsection